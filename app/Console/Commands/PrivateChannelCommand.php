<?php

namespace App\Console\Commands;

use App\Events\ConfirmPaymentEvent;
use App\Events\NotificationEvent;
use App\Models\Transaction;
use Illuminate\Console\Command;

class PrivateChannelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:private-channel-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $transaction = Transaction::select('*')->where('id', 3)->first();
        ConfirmPaymentEvent::dispatch($transaction);
    }
}
