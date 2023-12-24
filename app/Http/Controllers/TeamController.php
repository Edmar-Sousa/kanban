<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeamController extends Controller
{
    public function index()
    {
        return Inertia::render('Team', [
            'image' =>  Auth::user()->image,
        ]);
    }


    public function list()
    {

        $friends = Friends::select([
            'id',
            'destination_user',
            'source_user',
            'status',
        ])
            ->where('destination_user', Auth::user()->id)
            ->with([
                'source_user_data' => fn ($query) => $query->select([ 'id', 'name', 'email', 'image' ]),
            ])
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
}
