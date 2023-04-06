<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;


Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('homepage');
    Route::put('/task', [TaskController::class, 'update'])->name('task');
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registre-se', [UserController::class, 'create'])->name('register');
Route::post('/registre-se', [UserController::class, 'store'])->name('register');
