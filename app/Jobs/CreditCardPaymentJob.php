<?php

namespace App\Jobs;


use Carbon\Carbon;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


use App\Constants\PaymentsStatus;
use App\Logic\AssasClient;
use App\Models\Plans;
use App\Models\Transaction;
use App\Models\User;

class CreditCardPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected User $user;
    protected Plans $plan;

    protected string $transactionId;
    protected array $form;


    public function __construct(User $user, Plans $plan, string $transactionId, array $form)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->transactionId = $transactionId;

        $this->form = $form;
    }



    public function getStatusEnumValue(string $status)
    {

        $status = match ($status) {
            'PENDING', 'RECEIVED' => PaymentsStatus::PENDDING,
            'CONFIRMED' => PaymentsStatus::CONFIRMED,
            'REFUNDED' => PaymentsStatus::CANCELED,
        };


        return $status->value;
    }



    public function handle()
    {
        $transactionModel = new Transaction();
        $userModel = new User();

        try {
            $dueData = Carbon::now()->addDay()->format('Y-m-d');

            [$monthExpired, $yearExpired] = explode('/', $this->form['dateExpired']);


            $assasService = new AssasClient();


            $response = $assasService->createCreditCardPayment([
                'customer' => $this->user->customer,
                'value' => $this->plan->price,
                'dueDate' => $dueData,

                'name' => $this->form['name'],
                'creditCardNumber' => str_replace(' ', '', $this->form['creditCardNumber']),

                'expiryMonth' => $monthExpired,
                'expiryYear' => $yearExpired,

                'cvv' => $this->form['cvv'],

                'email' => $this->user->email,
                'cpf' => $this->user->document,

                'postalCode' => $this->user->address->zip_code,
                'addressNumber' => $this->user->address->numero,

                'phone' => preg_replace('/[^0-9]/', '', $this->user->phone),

                'ip' => $this->form['ip'],
            ]);


            $transactionModel->updateCreditCardTransaction($this->transactionId, [
                'externId' => $response->id,
                'status' => $this->getStatusEnumValue($response->status),
            ]);

            $userModel->update_plan($this->user->id, $this->plan->id);
        } catch (Exception $err) {
            $transactionModel->updateCreditCardTransaction($this->transactionId, [
                'status' => $this->getStatusEnumValue('REFUNDED'),
            ]);

            Log::error('Error CreditCardPaymentJob', [
                'message' => $err->getMessage(),
            ]);
        }

    }
}
