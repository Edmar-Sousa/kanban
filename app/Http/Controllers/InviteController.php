<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use stdClass;

class InviteController extends Controller
{

    protected Notification $notification_model;
    protected User $user_model;



    public function index()
    {
        $notifications = Notification::where( 'destination_user', Auth::user()->id )
        ->with( [ 
            'source_user_data' => fn ( $query ) => $query->select( [ 'id', 'name', 'image' ] ),
        ] )
        ->get();

        $notifications = $notifications->transform( function ( $notification ) {
            return [
                'source_user' => $notification->source_user_data->name,
                'image' => $notification->source_user_data->image,
                'visible' => $notification->visible,
            ];
        } );

        return $notifications;
    }
}
