<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{

    protected Notification $notification_model;
    protected User $user_model;


    public function __construct(Notification $notification_model, User $user_model)
    {
        $this->notification_model = $notification_model;
        $this->user_model = $user_model;
    }


    public function index()
    {
        $notifications = Notification::select([
            'id',
            'destination_user',
            'source_user',
            'message',
            'type',
            'visible',
        ])
        ->where( 'destination_user', Auth::user()->id )
        ->with( [ 
            'source_user_data' => fn ( $query ) => $query->select( [ 'id', 'name', 'image' ] ),
        ] )
        ->get();

        $notifications = $notifications->transform( function ( $notification ) {
            return [
                'id' => $notification->id,
                'source_user' => $notification->source_user_data->name,
                'image' => $notification->source_user_data->image,
                'message' => $notification->message,
                'type' => $notification->type,
                'visible' => $notification->visible,
            ];
        } );

        return $notifications;
    }


    public function markview(Request $request, string $id)
    {
        
        $this->notification_model->markview($id);

        return Response::json([ 
            'type' => 'success', 
            'message' => 'Notificação atualizada' 
        ]);

    }


    public function markaccept(Request $request, string $id)
    {

    }
}
