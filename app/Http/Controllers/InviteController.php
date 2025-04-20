<?php

namespace App\Http\Controllers;

use Exception;

use App\Events\NotificationEvent;
use App\Models\Friends;
use App\Models\Notification;
use App\Models\User;
use App\Http\Requests\InviteUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{

    protected User $userModel;
    protected Notification $notificationModel;
    protected Friends $friendsModel;


    function __construct(User $userModel, Notification $notificationModel, Friends $friendsModel)
    {
        $this->userModel = $userModel;
        $this->notificationModel = $notificationModel;
        $this->friendsModel = $friendsModel;
    }


    public function create(InviteUserRequest $request)
    {
        $destinationUser = $this->userModel->findByEmail($request->get('email'));
        $sourceUser = Auth::user();

        if ($this->friendsModel->alredy_exists_invite($sourceUser->id, $destinationUser->id)) {
            return redirect()->back()
                ->with('type', 'warning')
                ->with('message', 'Convite já foi enviado');
        }


        $notification = $this->notificationModel->store([
            'destination_user' => $destinationUser->id,
            'source_user' => $sourceUser->id,
            'message' => 'Você tem um convite de amizade',
            'type' => Notification::TYPE_INVITE,
        ]);

        $sourceUser->friends()->attach($destinationUser->id);

        NotificationEvent::dispatch($destinationUser, $notification, $sourceUser);

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Convite enviado com sucesso');
    }
    public function update(int $id)
    {
        try {
            $friendInvite = $this->friendsModel->get_by_id($id);
            $sourceUser = Auth::user();

            $this->friendsModel->accept_invite($friendInvite->id);

            $notification = $this->notificationModel->store([
                'destination_user' => $friendInvite->source_user_data->id,
                'source_user' => $sourceUser->id,
                'message' => 'Seu convite foi aceito, agora vocês são amigos',
                'type' => Notification::TYPE_SYSTEM,
            ]);

            NotificationEvent::dispatch(
                $friendInvite->source_user_data,
                $notification,
                $sourceUser
            );

            return response()->json([
                'message' => 'Convite aceito com sucesso'
            ]);
        }

        catch (Exception $err) {
            return response()
                ->json([
                    'message' => 'Erro ao aceitar convite'
                ], 500);
        }
    }

}
