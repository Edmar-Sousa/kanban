<?php

use App\Http\Controllers\AssasWebHookController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskBoardController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\TeamController;


Route::middleware('auth')->group(function () {
    Route::group([
        'as' => 'payment.',
        'prefix' => '/payment',
    ], function () {

        Route::get('/{id}', [PaymentController::class, 'checkStatus'])->name('status');

        Route::get('/plan/{id}', [PaymentController::class, 'index'])->name('index');
        Route::post('/', [PaymentController::class, 'create'])->name('create');

    });


    Route::group([
        'as' => 'taskboard.',
        'prefix' => '/task-board'
    ], function () {

        Route::get('/', [TaskBoardController::class, 'index'])->name('index');
        Route::get('/list', [TaskBoardController::class, 'list'])->name('list');

        Route::post('/', [TaskBoardController::class, 'store'])->name('create');
        Route::delete('/', [TaskBoardController::class, 'delete'])->name('delete');

        Route::group([
            'as' => 'task.',
            'prefix' => '/task',
        ], function () {

            Route::get('/{id}', [TaskController::class, 'index'])->name('index');
            Route::post('/', [TaskController::class, 'store'])->name('create');
            Route::put('/', [TaskController::class, 'update'])->name('update');
            Route::delete('/{id}', [TaskController::class, 'delete'])->name('delete');
        });

    });


    Route::group([
        'as' => 'team.',
        'prefix' => 'team',
    ], function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/list', [TeamController::class, 'list'])->name('list');

        Route::group([
            'as' => 'invite.',
            'prefix' => '/invites',
        ], function () {
            Route::get('/', [TeamController::class, 'invites'])->name('index');
            Route::post('/', [InviteController::class, 'create'])->name('create');

            Route::put('/{id}', [InviteController::class, 'update'])->name('update');
        });

        Route::delete('/{id}', [TeamController::class, 'delete'])->name('delete');
    });

    Route::get('/config', [ConfigController::class, 'index'])->name('config');

    Route::post('/user', [UserController::class, 'update'])->name('user');
    Route::get('/plans', [PlansController::class, 'index'])->name('plans');

    Route::group([
        'as' => 'notifications.',
        'prefix' => 'notifications',
    ], function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::put('/mark-view/{id}', [NotificationController::class, 'markview'])->name('mark-view');
    });
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('payment/status/{id}', [PaymentController::class, 'status'])->name('payment.check');

Route::group([
    'as' => 'register.',
    'prefix' => '/registre-se',
], function () {

    Route::get('/', [UserController::class, 'create'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('create');


    Route::post('/validate-step-one', [UserController::class, 'validateStepOne'])->name('step-one');
    Route::post('/validate-step-two', [UserController::class, 'validateStepTwo'])->name('step-two');
});

Route::redirect('/', '/task-board');


Route::post('/webhook/assas', AssasWebhookController::class)->name('webhook.assas');
