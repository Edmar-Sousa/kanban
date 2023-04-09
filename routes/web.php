<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskBoardController;

Route::middleware('auth')->group(function () {
    // Route::put('/task', [TaskController::class, 'update'])->name('task');
    
    Route::get('/task-board', [TaskBoardController::class, 'index'])->name('taskboard');
    Route::post('/task-board', [TaskBoardController::class, 'store'])->name('taskboard');
    
    Route::get('/task-board/task/{id}', [TaskController::class, 'index'])->name('task');
    Route::post('/task-board/task/{id}', [TaskController::class, 'store'])->name('task');

});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registre-se', [UserController::class, 'create'])->name('register');
Route::post('/registre-se', [UserController::class, 'store'])->name('register');

Route::redirect('/', '/task-board');
