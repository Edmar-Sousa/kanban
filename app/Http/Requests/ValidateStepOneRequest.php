<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStepOneRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:40'],
        ];
    }


    public function messages() 
    {
        return [
            'email.unique' => 'O campo email informado ja esta em uso',

            'required' => 'O campo :attribute é obrigatorio.',
            'email'    => 'Informe um email valido.',

            'min' => 'O campo :attribute deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no maximo :max caracteres.',
        ];
    }


    public function attributes() 
    {
        return [
            'email'    => 'e-mail',
            'password' => 'senha',
        ];
    }
}
