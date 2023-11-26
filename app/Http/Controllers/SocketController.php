<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

use Exception;
use SplObjectStorage;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class SocketController implements MessageComponentInterface
{
    protected array $clients;


    public function __construct()
    {
        $this->clients = [];
    }


    public function onOpen( ConnectionInterface $connection ) 
    {
        
    }

    public function onClose( ConnectionInterface $conn ) 
    {

    }

    public function onError( ConnectionInterface $conn, Exception $e ) 
    {

    }

    public function onMessage( ConnectionInterface $from, $msg ) 
    {
        $payload = json_decode($msg);

        if (!empty($payload->event) && $payload->event == 'auth')
        {
            try {
                $user = JWTAuth::setToken($payload->token)->authenticate();

                $this->clients[$user->id] = $from;
            }

            catch (TokenInvalidException $err)
            {
                print_r($err->getMessage());
                $from->close();
            }

        }
    }

}
