<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InviteController extends Controller
{

    protected Notification $notification_model;
    protected User $user_model;


    public function __construct( Notification $notification_model, User $user_model )
    {
        $this->notification_model = $notification_model;
        $this->user_model = $user_model;
    }

    
    public function store( Request $request )
    {

        try 
        {
            DB::beginTransaction();

            $user = $this->user_model->find_by_email( $request->input( 'email' ) );
    
            if ( empty( $user ) )
                return Redirect::back()
                    ->with( 'status', 'error' )
                    ->with( 'message', 'User not found' );


            $this->notification_model->store( [ 
                'destination_user' => $user->id,
                'source_user' => Auth::user()->id,
            ] );

            DB::commit();            
        }

        catch ( Exception $err )
        {
            DB::rollBack();
            return response()->json( [ 'message' => 'Erro create invite' ], 500 );
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
