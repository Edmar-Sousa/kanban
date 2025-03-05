<?php


namespace App\Logic;

use App\Jobs\UploadImageJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProcessFile
{

    public static function processUploadFile(Request &$request, $user): void
    {

        $file = $request->file('image');

        $file_extension = $file->getClientOriginalExtension();
        $file_name = Str::random(35) . time();

        $relative_path = 'jobs/' . $file_name . '.' . $file_extension;

        Storage::put($relative_path, file_get_contents($file->getRealPath()));
        $storage_path = Storage::path($relative_path);

        UploadImageJob::dispatch($user->id, $storage_path, $file_name);
    }

}

