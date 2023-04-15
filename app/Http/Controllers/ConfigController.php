<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfigController extends Controller
{
    public function index()
    {
        return Inertia::render('Config', [
            'user' => Auth::user(),
            'title' => 'Ajustes'
        ]);
    }
}
