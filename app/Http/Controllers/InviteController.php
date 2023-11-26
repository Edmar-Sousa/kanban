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

    
    public function store( stdClass $data, User $logged_user )
    {

        try 
        {
            DB::beginTransaction();

            $user = User::where('email', $data->email)->first();

            // tratar usuario não encontrado

            Notification::create( [ 
                'destination_user' => $user->id,
                'source_user' => $logged_user->id,
            ] );

            DB::commit();

            return $user->id;
        }

        catch ( Exception $err )
        {
            DB::rollBack();
        }

    }


    public function index()
    {
        $notifications = $this->notification_model->notifications_with_source_user( Auth::user()->id );

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
