<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfigController extends Controller
{
    public function index()
    {
        return Inertia::render('Config', [
            'title' => 'Ajustes'
        ]);
    }
}
