<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
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




    /**
     * @return Collection<int, Notification>
     */
    public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        // TODO: use pagination
        $notifications = Notification::select([
            'id',
            'destination_user',
            'source_user',
            'message',
            'type',
            'visible',
        ])
        ->where( 'destination_user', $user->id )
        ->with( [ 
            'source_user_data' => fn ( $query ) => $query->select( [ 'id', 'name', 'image' ] ),
        ] )
        ->get();

        return $notifications;
    }


    /**
     * @param Request $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function markview(Request $request, string $id): JsonResponse
    {
        
        $this->notification_model->markview($id);

        return Response::json([ 
            'type' => 'success', 
            'message' => 'Notificação atualizada' 
        ]);

    }


}
