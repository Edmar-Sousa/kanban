<?php

namespace App\Logic;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class AssasClient
{

    private Client $assasHttpClient;

    private array $headers;


    public function __construct()
    {
        $this->assasHttpClient = new Client();

        $this->headers = [
            'access_token' => env('ASSAS_API_KEY'),

            'accept' => 'application/json',
            'content-type' => 'application/json',
        ];
    }



    public function create_customer($body)
    {

        try {
            $response = $this->assasHttpClient->post(env('ASSAS_API_URL') . '/customers', [
                'headers' => $this->headers,
                'body' => json_encode($body),
            ]);

            return json_decode($response->getBody()->getContents());
        } catch (GuzzleException $err) {

            Log::error('AssasClient http error: ', [
                'body' => $body,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        } catch (Exception $err) {
            Log::error('AssasClient error: ', [
                'body' => $body,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        }

    }



    public function createSubscriberWithCreditCard(array $data)
    {
        try {
            $response = $this->assasHttpClient->post(env('ASSAS_API_URL') . '/subscriptions', [
                'headers' => $this->headers,

                'body' => json_encode([
                    'customer' => $data['customer'],
                    'billingType' => 'CREDIT_CARD',

                    'cycle' => 'MONTHLY',
                    'value' => $data['value'],
                    'nextDueDate' => $data['nextDueDate'],
                    'externalReference' => $data['transaction_id'],


                    'creditCard' => [
                        'holderName' => $data['name'],
                        'number' => $data['creditCardNumber'],

                        'expiryMonth' => $data['expiryMonth'],
                        'expiryYear' => $data['expiryYear'],

                        'ccv' => $data['cvv'],
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
        } catch (GuzzleException $err) {

            Log::error('AssasClient http error: ', [
                'body' => $data,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        } catch (Exception $err) {
            Log::error('AssasClient error: ', [
                'body' => $data,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        }

    }
}
