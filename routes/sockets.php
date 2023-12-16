<?php

use App\Utils\SocketIO;
use App\Http\Controllers\SocketController;


SocketIO::on('auth', [SocketController::class, 'auth']);
SocketIO::on('invite-friend', [SocketController::class, 'addFriend']);
SocketIO::on('accept-invite', [SocketController::class, 'acceptInvite']);


