<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('TaskBoard');
})->name('homepage');


Route::get('/login', function () {
    return Inertia::render('Login');
})->name('site.login');

Route::get('/registre-se', function () {
    return Inertia::render('Register');
})->name('site.register');
