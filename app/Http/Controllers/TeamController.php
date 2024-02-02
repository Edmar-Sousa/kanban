<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteFriendRequest;
use App\Models\Friends;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeamController extends Controller
{

    protected Friends $friends_model;


    public function __construct(Friends $friends_model)
    {
        $this->friends_model = $friends_model;
    }


    public function index()
    {
        return Inertia::render('Team', [
            'image' =>  Auth::user()->image,
            'id' => Auth::user()->id,
        ]);
    }


    public function list(Request $request)
    {

        $perPage = $request->per_page ?? 10;

        $friends = $this->friends_model->list_friends( Auth::user()->id );
        
        return response()->json($friends);
    }



    public function invites() 
    {
        $friends = $this->friends_model->find_user_invites( Auth::user()->id );

        return response()->json($friends);
    }



    public function delete(DeleteFriendRequest $request)
    {
        $this->friends_model->remove_friend( $request->input('id'), Auth::user()->id );

        return response()->json([
            'message' => 'Amigo removido com sucesso',
        ]);
    }
}
