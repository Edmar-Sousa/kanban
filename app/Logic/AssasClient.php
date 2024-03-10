<?php

namespace App\Logic;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class AssasClient 
{

    private Client $assasHttpClient;

    private $headers;


    public function __construct()
    {
        $this->assasHttpClient = new Client();

        $this->headers = [
            'Content-Type' => 'application/json',
            'access_token' => env('ASSAS_API_KEY'),
            
            'Accept' => 'application/json',
        ];
    }



    public function create_customer( $body,  )
    {

        try 
        {
            $response = $this->assasHttpClient->request('POST', env('ASSAS_API_URL') . '/customers', [
                'headers' => $this->headers,
                'body' => json_encode($body),
            ]);


            return json_decode($response->getBody()->getContents());
        }

        catch (GuzzleException $err)
        {

            Log::error('AssasClient http error: ', [
                'body' => $body,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        }
        
        catch (Exception $err) 
        {
            Log::error('AssasClient error: ', [
                'body' => $body,
                'message' => $err->getMessage(),
            ]);

            throw $err;
        }

    }

}
