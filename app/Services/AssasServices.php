<?php

namespace App\Services;


use GuzzleHttp\Client;

class AssasServices
{

    protected Client $httpClient;


    public function __construct()
    {
        $this->httpClient = new Client([

            'base_uri' => env('ASSAS_API_URL'),
            'headers' => [
                'access_token' => env('ASSAS_API_KEY'),
                
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
    }



    public function createCreditCardPayment(array $data)
    {
        $response = $this->httpClient->post('/payments', [
            'body' => json_encode([
                'customer' => $data['customer'],
                'billingType' => 'CREDIT_CARD',

                'value' => $data['value'],
                'dueDate' => $data['dueDate'],

                'creditCard' => [
                    'holderName' => $data['name'],
                    'number' => $data['creditCardNumber'],
                    
                    'expiryMonth' => $data['expiryMonth'],
                    'expiryYear' => $data['expiryYear'],
    
                    'cvv' => $data['cvv'],
                ],


                'creditCardHolderInfo' => [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'cpfCnpj' => $data['cpf'],
                    
                    'postalCode' => $data['postalCode'],
                    'addressNumber' => $data['addressNumber'],

                    'phone' => $data['phone'],
                ],

                'remoteIp' => $data['ip'],
            ])
        ]);

        return json_decode($response->getBody()->getContents());
    }

}


