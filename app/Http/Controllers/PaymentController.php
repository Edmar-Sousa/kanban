<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


use App\Http\Requests\CreditCardRequest;
use App\Models\Plans;
use App\Models\User;
use App\Services\AssasServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    protected Plans $planModel;


    public function __construct(Plans $planModel)
    {
        $this->planModel = $planModel;
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

        dd(Auth::user()->customer);

        $plan = $this->planModel->get_plan_with_id($forms['planId']);


        // temporario
        if (is_null($plan))
            return abort(404);

        $dueData = Carbon::now()->addDay()->format('Y-m-d');


        $assasService = new AssasServices();
        $response = $assasService->createCreditCardPayment([
            'customer' => Auth::user()->customer,
            'dueDate' => $dueData,
            'value' => $plan->price,
        ]);


        dd($response);

    }

}
