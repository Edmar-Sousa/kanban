<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Friends;
use App\Models\Notification;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\InviteUserRequest;

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
        $destinationUser = $this->userModel->find_by_email($request->get('email'));
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

}
