<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Address;

class ConfigController extends Controller
{

    protected Address $address_model;


    public function __construct( Address $address_model )
    {
        $this->address_model = $address_model;
    } 


    public function index()
    {
        return Inertia::render('Config', [
            'user' => Auth::user(),
            'address' => $this->address_model->address_from_user( Auth::user()->id ),
            'title' => 'Ajustes'
        ]);
    }
}
