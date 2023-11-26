<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use Exception;
use SplObjectStorage;

class SocketController implements MessageComponentInterface
{
    protected SplObjectStorage $clients;


    public function __construct()
    {
        $this->clients = new SplObjectStorage();
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
        $from->send(json_encode([ 'event' => 'notification', 'data' => [ 'msg' => 'Hello client!' ] ]));
    }

}
