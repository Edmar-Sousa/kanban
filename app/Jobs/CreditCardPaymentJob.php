<?php

namespace App\Jobs;


use App\Events\ConfirmPaymentEvent;
use App\Models\ActivityPlanUser;
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



    public function getStatusEnumValue(string $status): PaymentsStatus
    {
        return match ($status) {
            'PENDING', 'RECEIVED' => PaymentsStatus::PENDDING,
            'CONFIRMED', 'ACTIVE' => PaymentsStatus::CONFIRMED,
            'REFUNDED' => PaymentsStatus::CANCELED,
        };
    }



    public function handle()
    {
        $transactionModel = new Transaction();
        $activityPlanUserModel = new ActivityPlanUser();

        try {
            $dueData = Carbon::now()->addDays(30)->format('Y-m-d');

            [$monthExpired, $yearExpired] = explode('/', $this->form['dateExpired']);

            $assasService = new AssasClient();

            $response = $assasService->createSubscriberWithCreditCard([
                'customer' => $this->user->customer,
                'value' => $this->plan->price,
                'nextDueDate' => $dueData,
                'transaction_id' => $this->transactionId,

                'name' => $this->form['name'],
                'creditCardNumber' => str_replace(' ', '', $this->form['creditCardNumber']),

                'expiryMonth' => $monthExpired,
                'expiryYear' => $yearExpired,

                'cvv' => $this->form['cvv'],

                'email' => $this->user->email,
                'cpf' => preg_replace('/\D/', '', $this->user->document),

                'postalCode' => $this->user->address->zip_code,
                'addressNumber' => $this->user->address->numero,

                'phone' => preg_replace('/\D/', '', $this->user->phone),

                'ip' => $this->form['ip'],
            ]);


            $statusTransaction = $this->getStatusEnumValue($response->status);

            $transaction = $transactionModel->updateCreditCardTransaction($this->transactionId, [
                'externId' => $response->id,
                'status' => $statusTransaction->value,
            ]);

            if ($statusTransaction == PaymentsStatus::CONFIRMED) {
                $activityPlanUserModel->updatePlanUser($this->user->id, $this->plan->id, $dueData);
                ConfirmPaymentEvent::dispatch($transaction);
            }

        } catch (Exception $err) {
            $statusTransaction = $this->getStatusEnumValue('REFUNDED');
            $transaction = $transactionModel->updateCreditCardTransaction($this->transactionId, [
                'status' => $statusTransaction->value,
            ]);

            Log::error('Error CreditCardPaymentJob', [
                'message' => $err->getMessage(),
            ]);

            ConfirmPaymentEvent::dispatch($transaction);
        }

    }
}
