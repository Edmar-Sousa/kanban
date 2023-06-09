<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskBoardController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PaymentController;


Route::middleware('auth')->group(function () {
    
    Route::get('/task-board', [TaskBoardController::class, 'index'])->name('taskboard');
    Route::post('/task-board', [TaskBoardController::class, 'store'])->name('taskboard');
    Route::delete('/task-board', [TaskBoardController::class, 'delete'])->name('taskboard');
    
    Route::get('/task-board/task/{id}', [TaskController::class, 'index'])->name('task');
    Route::post('/task-board/task', [TaskController::class, 'store'])->name('task');
    Route::put('/task-board/task', [TaskController::class, 'update'])->name('task');
    Route::delete('/task-board/task', [TaskController::class, 'delete'])->name('task');

    Route::get('/team', [TeamController::class, 'index'])->name('team');

    Route::get('/config', [ConfigController::class, 'index'])->name('config');

    Route::post('/user', [UserController::class, 'update'])->name('user');
    Route::get('/plans', [PlansController::class, 'index'])->name('plans');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registre-se', [UserController::class, 'create'])->name('register');
Route::post('/registre-se', [UserController::class, 'store'])->name('register');

Route::redirect('/', '/task-board');
