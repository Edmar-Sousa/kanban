<?php

namespace App\Events;

use App\Models\Transaction;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ConfirmPaymentEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $paymentId;
    public string $status;
    public string $planName;


    public function __construct(Transaction $transaction)
    {
        $this->paymentId = $transaction->id;
        $this->status = $transaction->status;
        $this->planName = $transaction->plan->title;
    }


    public function broadcastOn(): Channel
    {
        return new PrivateChannel('payment.' . $this->paymentId);
    }
}
