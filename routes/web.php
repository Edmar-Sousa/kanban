<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('TaskBoard');
})->name('homepage');


Route::get('/login', [UserController::class, 'login'])->name('site.login');
Route::get('/registre-se', [UserController::class, 'create'])->name('site.register');
Route::post('/registre-se', [UserController::class, 'store'])->name('site.register');
