<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    protected User $user_model;


    public function __construct(User $user_model)
    {
        $this->user_model = $user_model;
    } 


    public function create()
    {
        return Inertia::render('Register');
    }


    public function store(UserStoreRequest $request)
    {
        $this->user_model->store($request->validated());
        return redirect()->route('login');
    }


    public function login()
    {
        return Inertia::render('Login');
    }


    public function auth(LoginRequest $request)
    {
        $user = $request->validated();

        if ( Auth::attempt( [ 'email' => $user['email'], 'password' => $user['password'] ] ) )
            return redirect()->route('homepage');
    }
}
