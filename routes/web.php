<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('TaskBoard');
})->name('homepage');


Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login');
