<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Ratchet\ConnectionInterface;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Friends;
use App\Models\Notification;
use App\Models\User;
use App\Utils\SocketIO;

use Exception;
use stdClass;

class SocketController extends SocketIO
{

    private function sendToSocket( int $id, string $event, $data = null )
    {

        $socket_connection = self::$clients[ $id ];

        if ( !empty( $socket_connection ) )
        {
            $socket_connection->send( json_encode( [
                'event' => $event,
                'data' => $data,
            ] ) );
        }

        else
            print_r('socket conection is empty'. PHP_EOL);
    }


    public function auth(ConnectionInterface $from, stdClass $payload)
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


    public function addFriend(ConnectionInterface $from, stdClass $payload)
    {
        $logged_user = JWTAuth::setToken($payload->token)->authenticate();

        try 
        {
            $user = User::where( 'email', $payload->data->email )->first();

            if ( empty( $user ) )
                throw new Exception('Usuario não encontrado');

            DB::beginTransaction();

            $fried = Friends::where('destination_user', $user->id)
                ->where('source_user', $logged_user->id)
                ->first();

            if (!empty($fried))
                throw new Exception('Convite já enviado para o usuario');


            Notification::create( [ 
                'destination_user' => $user->id,
                'source_user' => $logged_user->id,
                'message' => 'Você tem um convite de amizade',
                'type' => Notification::TYPE_INVITE,
            ] );

            Friends::create([
                'destination_user' => $user->id,
                'source_user' => $logged_user->id,
            ]);

            DB::commit();

            $this->sendToSocket($user->id, 'notification');
            
            $from->send( json_encode( [
                'event' => 'invite-friend-success',
                'data' => [
                    'status' => 'success',
                    'message' => 'Convite enviado com sucesso',
                ],
            ] ) );
        }

        catch ( Exception $err )
        {
            DB::rollBack();

            $this->sendToSocket( $logged_user->id, 'invite-friend-error', [
                'status' => 'error',
                'message' => $err->getMessage(),
            ] );
        }

    }
    
}
