<?php

namespace App\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UploadImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $filepath;
    private string $filename;
    private string $user_id;

    public function __construct(string $user_id, string $filepath, string $filename)
    {
        $this->user_id = $user_id;
        $this->filepath = $filepath;
        $this->filename = $filename;
    }


    public function handle()
    {
        $image_manager = new ImageManager(Driver::class);
        $image = $image_manager->read($this->filepath);

        $public_path = public_path('storage/images') . '/' . $this->filename . '.webp';


        $image->toWebp(60)->save($public_path);
        unlink($this->filepath);

        $user = User::where('id', $this->user_id)
            ->first();

        if (file_exists(public_path($user->image)))
            unlink(public_path($user->image));

        $user->update_user($user->id, [ 'image' => 'images/' . $this->filename . '.webp' ]);
    }
}
