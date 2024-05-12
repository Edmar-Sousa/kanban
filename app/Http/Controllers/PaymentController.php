<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


use App\Http\Requests\CreditCardRequest;
use App\Jobs\CreditCardPaymentJob;
use App\Logic\AssasClient;
use App\Models\Plans;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    protected Plans $planModel;
    protected User  $userModel;


    public function __construct(Plans $planModel, User $userModel)
    {
        $this->planModel = $planModel;
        $this->userModel = $userModel;
    }


    public function index(string $id)
    {
        return Inertia::render('Payment', [
            'planId' => $id,
        ]);
    }


    public function create(CreditCardRequest $request)
    {
        $forms = $request->validated();
        $forms['ip'] = $request->ip();

        $user = $this->userModel->getUserWithAddress(Auth::user()->id);


        if (is_null($user->address))
            return Redirect::back()
                ->with('status', 'error')
                ->with('message', 'É necessario cadastrar um endereço');

        
        $plan = $this->planModel->get_plan_with_id($forms['planId']);

        // temporario
        if (is_null($plan))
            return abort(404);


        CreditCardPaymentJob::dispatch($user, $plan, $forms);


        return Redirect::route('taskboard')
            ->with('status', 'success')
            ->with('message', 'Seu plano foi atualizado');
    }

}
