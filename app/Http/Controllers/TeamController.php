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

        $friends = Friends::select([
            'id',
            'destination_user',
            'source_user',
            'status',
        ])
            ->where(fn ($query) =>
                $query->where('destination_user', Auth::user()->id)
                    ->orWhere('source_user', Auth::user()->id)
            )
            ->where('status', Friends::STATUS_ACEPTED)

            ->with([
                'source_user_data' => fn ($query) => $query->select([ 'id', 'name', 'email', 'image' ]),
                'destination_user_data' => fn ($query) => $query->select([ 'id', 'name', 'email', 'image' ]),
            ])
            ->where('status', Friends::STATUS_ACEPTED)
            ->get();


        return response()->json($friends);
    }



    public function invites() 
    {
        $friends = Friends::where('destination_user', Auth::user()->id)
            ->where('status', Friends::STATUS_INVITED)
            ->with([
                'source_user_data'
            ])
            ->paginate(10);


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
