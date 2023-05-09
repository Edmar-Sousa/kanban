<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PlansController extends Controller
{
    public function index()
    {
        return Inertia::render('Plans', [
            'title' => 'Planos de assinatura'
        ]);
    }
}
