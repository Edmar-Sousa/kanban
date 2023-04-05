<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('TaskBoard');
    })->name('homepage');
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registre-se', [UserController::class, 'create'])->name('register');
Route::post('/registre-se', [UserController::class, 'store'])->name('register');
