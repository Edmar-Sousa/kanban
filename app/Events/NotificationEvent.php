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

    /** @var Notification */
    public Notification $notification;

    /** @var string */
    public string $image;

    /** @var string */
    public string $source_user_name;

    public function __construct(
        private User $user,
        Notification $notification,
        private User $sourceUser,
    ) {
        $this->notification = $notification;

        $this->image = $sourceUser->image;
        $this->source_user_name = $sourceUser->name;
    }

    public function broadcastAs(): string
    {
        return 'notification.event';
    }

    /**
     * @return array{image: string, notification: Notification, source_user_name: string}
     */
    public function broadcastWith(): array
    {
        return [
            'notification' => $this->notification,
            'image' => $this->image,
            'source_user_name' => $this->source_user_name,
        ];
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('notification.' . $this->user->id);
    }
}
