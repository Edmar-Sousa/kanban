<?php

use App\Http\Controllers\InviteController;
use App\Utils\SocketIO;
use Ratchet\ConnectionInterface;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Teste extends SocketIO
{

    public function auth(ConnectionInterface $from, stdClass $payload)
    {
        if ($payload->event == 'auth')
        {
            try {
                $user = JWTAuth::setToken($payload->token)->authenticate();

                self::$clients[$user->id] = $from;
            }

            catch (TokenInvalidException $err)
            {
                print_r($err->getMessage());
                $from->close();
            }
        }
    }


    public function notify(ConnectionInterface $from, stdClass $payload)
    {
        if ($payload->event == 'notificate')
        {
            $user = JWTAuth::setToken($payload->token)->authenticate();
            
            $invite = new InviteController();
            $target_user_id = $invite->store($payload->data, $user);
            
            $socket_connection = self::$clients[$target_user_id];

            if (!empty($socket_connection))
            {
                $socket_connection->send(json_encode([
                    'event' => 'notificate',
                    'data' => null
                ]));
            }
        }
    }

}




SocketIO::on('auth', [Teste::class, 'auth']);
SocketIO::on('notificate', [Teste::class, 'notify']);



