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
        $friends = Friends::select([
            'id',
            'destination_user',
            'status',
        ])
            ->where('destination_user', Auth::user()->id)
            ->with([
                'destination_user_data' => fn ($query) => $query->select([ 'id', 'name', 'email', 'image' ]),
            ])
            ->get();

        $friends->transform(function ($friend) {
            return [
                'id' => $friend->id,
                'status' => $friend->status,
                'user_id' => $friend->destination_user_data->id,
                'user_email' => $friend->destination_user_data->email,
                'user_name' => $friend->destination_user_data->name,
                'user_image' => $friend->destination_user_data->image,
            ];
        });

        return Inertia::render('Team', [
            'image' =>  Auth::user()->image,
            'friends' => $friends,
        ]);
    }
}
