<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public User $user_model;

    public function __construct(User $user)
    {
        $this->user_model = $user;
    }


    public function auth(LoginRequest $request)
    {
        $user_credentials = $request->validated();

        $user = $this->user_model->find_by_email($user_credentials['email']);

        if (Hash::check($user_credentials['password'], $user->password)) {
            Auth::login($user);

            return redirect()->route('taskboard.index');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
