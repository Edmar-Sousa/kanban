<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


use App\Http\Requests\CreditCardRequest;
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


        $user = $this->userModel->getUserWithAddress(Auth::user()->id);

        // TODO adicionar a mensagem no front end
        if (is_null($user->address))
            return Redirect::back()
                ->with('status', 'error')
                ->with('message', 'É necessario cadastrar um endereço');

        
        $plan = $this->planModel->get_plan_with_id($forms['planId']);

        // temporario
        if (is_null($plan))
            return abort(404);

        
        $dueData = Carbon::now()->addDay()->format('Y-m-d');

        [$monthExpired, $yearExpired] = explode('/', $forms['dateExpired']);

        $assasService = new AssasClient();
        $response = $assasService->createCreditCardPayment([
            'customer' => $user->customer,
            'dueDate' => $dueData,
            'value' => $plan->price,

            'name' => $forms['name'],
            'creditCardNumber' => str_replace(' ', '', $forms['creditCardNumber']),

            'expiryMonth' => $monthExpired,
            'expiryYear' => $yearExpired,
            
            'cvv' => $forms['cvv'],

            'email' => $user->email,
            'cpf'   => $user->document,

            'postalCode' => $user->address->zip_code,
            'addressNumber' => $user->address->numero,
            'phone' => preg_replace('/[^0-9]/', '', $user->phone),

            'ip' => $request->ip(),
        ]);


        if ($response->status == 'CONFIRMED')
            $this->userModel->update_plan($user->id, $plan->id);


        return Redirect::route('taskboard')
            ->with('status', 'success')
            ->with('message', 'Seu plano foi atualizado');
    }

}
