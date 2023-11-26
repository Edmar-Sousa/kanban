<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use App\Http\Controllers\SocketController;

class SocketServe extends Command
{

    const SERVER_PORT = 8091;

    protected $signature = 'socket:start';
    protected $description = 'This command start the websocket serve';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $socketServer = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new SocketController()
                ),
            ),
            self::SERVER_PORT
        );

        echo 'SERVER running on port ' . self::SERVER_PORT;
        $socketServer->run();

    }
}
