<?php

namespace App\Utils;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use Exception;
use stdClass;


class SocketIO implements MessageComponentInterface
{
    protected static array $events = [];


    protected static array $clients = [];


    public static function on(string $event, array $callback): void
    {
        self::$events[$event] = $callback;
    }


    private function call(ConnectionInterface $from, stdClass $payload,): void
    {
        $arr = self::$events[$payload->event];

        call_user_func([new $arr[0], $arr[1]], $from, $payload);
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

        $this->call($from, $payload);
        
    }

}
