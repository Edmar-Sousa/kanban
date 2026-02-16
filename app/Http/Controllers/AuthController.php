<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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


    public function auth(LoginRequest $request): RedirectResponse
    {
        /** @var array{email: string, password: string} */
        $userCredentials = $request->validated();

        $user = $this->user_model->findByEmail($userCredentials['email']);

        if (Hash::check($userCredentials['password'], $user->password)) {
            Auth::login($user);

            return redirect()->route('taskboard.index');
        }

        return redirect()->back();
    }


    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
