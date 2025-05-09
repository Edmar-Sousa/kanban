<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NotificationEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Notification $notification;

    public function __construct(
        private User $user,
        Notification $notification,
        private User $sourceUser,
    ) {
        $this->notification = $notification;

        $this->notification->image = $sourceUser->image;
        $this->notification->source_user = $sourceUser->name;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('notification.' . $this->user->id);
    }
}
