<?php

namespace App\Jobs;

use App\Logic\AssasClient;
use App\Models\Plans;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreditCardPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    protected User $user;
    protected Plans $plan;

    protected array $form;


    public function __construct(User $user, Plans $plan, string $form)
    {
        $this->user = $user;
        $this->plan = $plan;

        $this->form = $form;
    }



    public function handle()
    {
        
        $userModel = new User();

        $dueData = Carbon::now()->addDay()->format('Y-m-d');

        [$monthExpired, $yearExpired] = explode('/', $this->form['dateExpired']);


        $assasService = new AssasClient();


        $response = $assasService->createCreditCardPayment([
            'customer' => $this->user->customer,
            'value'    => $this->plan->price,
            'dueDate' => $dueData,
            
            'name' => $this->form['name'],
            'creditCardNumber' => str_replace(' ', '', $this->form['creditCardNumber']),

            'expiryMonth' => $monthExpired,
            'expiryYear' => $yearExpired,
            
            'cvv' => $this->form['cvv'],

            'email' => $this->user->email,
            'cpf'   => $this->user->document,

            'postalCode' => $this->user->address->zip_code,
            'addressNumber' => $this->user->address->numero,
            
            'phone' => preg_replace('/[^0-9]/', '', $this->user->phone),

            'ip' => $this->form['ip'],
        ]);


    }
}
