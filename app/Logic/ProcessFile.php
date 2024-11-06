<?php


namespace App\Logic;

use App\Jobs\UploadImageJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProcessFile
{

    public static function processUploadFile(Request &$request, $user)
    {

        $file = $request->file('image');

        $file_extension = $file->getClientOriginalExtension();
        $file_name = Str::random(35) . time();

        $store_path = storage_path('app/jobs') . '/' . $file_name . '.' . $file_extension;

        move_uploaded_file($file->getRealPath(), $store_path);

        UploadImageJob::dispatch($user->id, $store_path, $file_name);

    }
    
}

