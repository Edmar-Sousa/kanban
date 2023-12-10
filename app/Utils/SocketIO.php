<?php

namespace App\Utils;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

use Exception;
use Illuminate\Support\Facades\Auth;
use SplObjectStorage;
use stdClass;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class SocketIO implements MessageComponentInterface
{
    protected static array $clients = [];


    public static function on(string $event, array $callback): void
    {
        self::$clients[$event] = $callback;
    }


    private function call(stdClass $payload): void
    {
        $arr = self::$clients[$payload->event];

        call_user_func([new $arr[0], $arr[1]]);
    }


    private function parseMessage(&$message): stdClass
    {

        $payload = json_decode($message);

        if (empty($payload->event))
            throw new Exception('Event is required');


        return $payload;
    }


    public function onOpen( ConnectionInterface $connection ) 
    {}

    public function onClose( ConnectionInterface $conn ) 
    {}

    public function onError( ConnectionInterface $conn, Exception $e ) 
    {}

    public function onMessage( ConnectionInterface $from, $msg ) 
    {

        $payload = $this->parseMessage($msg);

        $this->call($payload);


        // if (!empty($payload->event) && $payload->event == 'auth')
        // {
        //     try {
        //         $user = JWTAuth::setToken($payload->token)->authenticate();

        //         $this->clients[$user->id] = $from;
        //     }

        //     catch (TokenInvalidException $err)
        //     {
        //         print_r($err->getMessage());
        //         $from->close();
        //     }
        // }


        // if (!empty($payload->event) && $payload->event == 'notificate')
        // {
        //     $user = JWTAuth::setToken($payload->token)->authenticate();
            
        //     $invite = new InviteController();
        //     $target_user_id = $invite->store($payload->data, $user);
            
        //     $socket_connection = $this->clients[$target_user_id];

        //     if (!empty($socket_connection))
        //     {
        //         $socket_connection->send(json_encode([
        //             'event' => 'notificate',
        //             'data' => null
        //         ]));
        //     }
        // }
        
    }

}
