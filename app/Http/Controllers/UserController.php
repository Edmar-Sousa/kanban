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
use App\Jobs\CreateCustomerAssas;
use App\Jobs\UploadImageJob;
use App\Logic\ProcessFile;
use GuzzleHttp\Client;

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
        $validated = $request->validated();

        $createdUser = $this->user_model->store( $validated );

        if ($request->hasFile('image'))
            ProcessFile::processUploadFile($request, $createdUser);

        CreateCustomerAssas::dispatch(
            $createdUser->id,
            $createdUser->name,
            $createdUser->document,
            $createdUser->phone
        );

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
            ProcessFile::processUploadFile($request, Auth::user());

        $this->user_model->update_user( Auth::user()->id, $user_data );
        $this->address_model->create_or_update_address( $data, Auth::user()->id );

        
        return redirect()->route('config')
                         ->with('status', 'success')
                         ->with('message', 'Perfil atualizado com sucesso');
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
