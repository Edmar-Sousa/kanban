<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;
use App\Models\Address;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    protected User $user_model;
    protected Address $address_model;


    public function __construct( User $user_model, Address $address_model )
    {
        $this->user_model = $user_model;
        $this->address_model = $address_model;
    } 


    public function create()
    {
        return Inertia::render('Register');
    }


    public function store( UserStoreRequest $request )
    {
        $this->user_model->store( $request->validated() );
        return redirect()->route('login');
    }


    public function login()
    {
        return Inertia::render('Login');
    }


    public function update( UserUpdateRequest $request )
    {
        $image_path = '/profile-picture.png';
        $data = $request->validated();

        if ( $request->hasFile('image') )
            $image_path = $request->file('image')->store('images', 'public');

        $this->user_model->update_user( Auth::user()->id, $data, $image_path );
        $this->address_model->create_or_update_address( $data, Auth::user()->id );

        return redirect()->route('config');
    }

}
