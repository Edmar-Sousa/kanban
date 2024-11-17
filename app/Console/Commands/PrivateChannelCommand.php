<?php

namespace App\Console\Commands;

use App\Events\NotificationEvent;
use App\Models\User;
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
        $user = User::where('id', 7)->first();
        NotificationEvent::dispatch($user);
    }
}
