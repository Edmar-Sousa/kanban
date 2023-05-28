<?php

namespace App\Http\Controllers;

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
}
