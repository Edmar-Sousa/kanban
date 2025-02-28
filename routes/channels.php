<?php

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('notification.{userId}', function (User $user, int $userId) {
    return $user->id == $userId;
});

Broadcast::channel('payment.{transactionId}', function (User $user, string $transactionId) {
    return $user->hasPaymentWithIdAssociated($transactionId);
});

