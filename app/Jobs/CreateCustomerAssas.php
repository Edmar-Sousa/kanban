<?php

namespace App\Jobs;

use App\Logic\AssasClient;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreateCustomerAssas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private int    $user_id,
        private string $name, 
        private string $document, 
        private string $phone,
    )
    {

    }


    public function handle()
    {
        $body = [
            'name'    => $this->name,
            'cpfCnpj' => preg_replace('/[^\d]/', '', $this->document),
            'phone'   => preg_replace('/[^\d]/', '', $this->phone),
        ];

        
        $assasClient = new AssasClient();
        $response = $assasClient->create_customer($body);

        $userModel = new User();
        $userModel->update_customer_from_user($this->user_id, $response->id);
    }
}
