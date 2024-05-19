<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use Inertia\Inertia;

use App\Http\Requests\CreditCardRequest;
use App\Jobs\CreditCardPaymentJob;
use App\Models\Plans;
use App\Models\Transaction;
use App\Models\User;

use Exception;

class PaymentController extends Controller
{

    protected Plans $planModel;
    protected User $userModel;
    protected Transaction $transactionModel;


    public function __construct(Plans $planModel, User $userModel, Transaction $transactionModel)
    {
        $this->planModel = $planModel;
        $this->userModel = $userModel;
        $this->transactionModel = $transactionModel;
    }


    public function index(string $id)
    {
        return Inertia::render('Payment', [
            'planId' => $id,
        ]);
    }


    public function create(CreditCardRequest $request)
    {
        try {
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


            $transaction = $this->transactionModel->createCreditCardTransaction([
                'planId' => $forms['planId'],
                'userId' => $user->id,
            ]);


            CreditCardPaymentJob::dispatch($user, $plan, $transaction->id, $forms);

            return Redirect::route('payment.status', ['id' => $transaction->id]);

        } catch (Exception $err) {
            Log::error('payment', [
                'message' => $err->getMessage(),
                'file' => $err->getFile(),
                'form' => $forms,
            ]);

            return Redirect::back()
                ->with('status', 'error')
                ->with('message', 'Aconteceu um erro, tente novamente');
        }

    }



    public function checkStatus(string $id)
    {
        return Inertia::render('PaymentStatus', [
            'paymentId' => $id,
        ]);
    }


    public function status(string $id)
    {

        $transaction = $this->transactionModel->checkStatusTransaction($id);

        return response()->json([
            'status' => $transaction->status,
            'plan' => $transaction->plan->title
        ]);
    }
}
