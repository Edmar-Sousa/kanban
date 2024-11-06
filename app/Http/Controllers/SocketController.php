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

    private function sendToSocket(int $id, string $event, $data = null)
    {

        $socket_connection = self::$clients[$id];

        if (!empty($socket_connection)) {
            $socket_connection->send(json_encode([
                'event' => $event,
                'data' => $data,
            ]));
        } else
            print_r('socket conection is empty' . PHP_EOL);
    }


    public function auth(ConnectionInterface $from, stdClass $payload)
    {
        try {
            $user = JWTAuth::setToken($payload->token)->authenticate();

            self::$clients[$user->id] = $from;
        } catch (TokenInvalidException $err) {
            print_r($err->getMessage());
            $from->close();
        }
    }


    public function addFriend(ConnectionInterface $from, stdClass $payload)
    {
        $logged_user = JWTAuth::setToken($payload->token)->authenticate();

        try {
            $user = User::where('email', $payload->data->email)->first();

            // TODO check the limit users plan
            if (!isset($user))
                throw new Exception('Usuario não encontrado');

            DB::beginTransaction();

            $fried = Friends::where('destination_user', $user->id)
                ->where('source_user', $logged_user->id)
                ->first();

            if (isset($fried))
                throw new Exception('Convite já enviado para o usuario');


            Notification::create([
                'destination_user' => $user->id,
                'source_user' => $logged_user->id,
                'message' => 'Você tem um convite de amizade',
                'type' => Notification::TYPE_INVITE,
            ]);

            $logged_user->friends()->attach($user->id);

            DB::commit();

            $this->sendToSocket($user->id, 'notification');

            $from->send(json_encode([
                'event' => 'invite-friend-success',
                'data' => [
                    'status' => 'success',
                    'message' => 'Convite enviado com sucesso',
                ],
            ]));
        } catch (Exception $err) {
            DB::rollBack();

            $this->sendToSocket($logged_user->id, 'invite-friend-error', [
                'status' => 'error',
                'message' => $err->getMessage(),
            ]);
        }

    }


    public function acceptInvite(ConnectionInterface $from, stdClass $payload)
    {
        $logged_user = JWTAuth::setToken($payload->token)->authenticate();

        try {
            DB::beginTransaction();

            $friendInvite = Friends::where('id', $payload->data->inviteId)
                ->with([
                    'source_user_data'
                ])
                ->first();

            $friendInvite->update([
                'status' => Friends::STATUS_ACEPTED,
            ]);


            Notification::create([
                'destination_user' => $friendInvite->source_user_data->id,
                'source_user' => $logged_user->id,
                'message' => 'Seu convite foi aceito, agora vocês são amigos',
                'type' => Notification::TYPE_SYSTEM,
            ]);

            DB::commit();

            $this->sendToSocket($friendInvite->source_user_data->id, 'notification');

            $from->send(json_encode([
                'event' => 'accept-invite-success',
                'data' => [
                    'status' => 'success',
                    'message' => 'Amigo adicionado',
                ],
            ]));
        } catch (Exception $err) {
            DB::rollBack();


            $from->send(json_encode([
                'event' => 'accept-invite-error',
                'data' => [
                    'status' => 'error',
                    'message' => 'Erro ao adicionar amigo',
                ],
            ]));
        }
    }
}
