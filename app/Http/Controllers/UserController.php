<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

use App\Models\User;
use App\Models\Address;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ValidateStepOneRequest;
use App\Http\Requests\ValidateStepTwoRequest;
use App\Jobs\UploadImageJob;
use Facade\FlareClient\Http\Response;

class UserController extends Controller
{
    protected User $user_model;
    protected Address $address_model;


    public function __construct( User $user_model, Address $address_model )
    {
        $this->user_model = $user_model;
        $this->address_model = $address_model;
    } 


    public function create()
    {
        return Inertia::render('Register');
    }


    public function store( UserStoreRequest $request )
    {
        $this->user_model->store( $request->validated() );
        return redirect()->route('login');
    }


    public function login()
    {
        return Inertia::render('Login');
    }


    public function update( UserUpdateRequest $request )
    {
        $data = $request->validated();

        $user_data = [
            'name' => $data['username'],
        ];


        if ( $request->hasFile('image') )
        {
            $file = $request->file('image');

            $file_extension = $file->getClientOriginalExtension();
            $file_name = Str::random(35) . time();

            $store_path = storage_path('app/jobs') . '/' . $file_name . '.' . $file_extension;

            move_uploaded_file($file->getRealPath(), $store_path);

            UploadImageJob::dispatch(Auth::user()->id, $store_path, $file_name);
        }

        $this->user_model->update_user( Auth::user()->id, $user_data );
        $this->address_model->create_or_update_address( $data, Auth::user()->id );

        return redirect()->route('config');
    }


    public function list( Request $request )
    {
        
    }



    public function validateStepOne(ValidateStepOneRequest $request)
    {
        $request->validated();
    }

    public function validateStepTwo(ValidateStepTwoRequest $request)
    {
        $request->validated();
    }

}
