<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

use App\Models\Address;

class ConfigController extends Controller
{

    protected Address $address_model;


    public function __construct( Address $address_model )
    {
        $this->address_model = $address_model;
    } 


    public function index(): InertiaResponse
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        return Inertia::render('Config', [
            'user' => $user,
            'address' => $this->address_model->address_from_user( $user->id ),
            'title' => 'Ajustes'
        ]);
    }
}
