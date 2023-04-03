<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:6'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'email'    => 'Informe um email valido.',
            'exists'   => 'O email informado não foi encontrado.',
            'min'      => 'O campo :attribute deve ter no minimo :min caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'senha',
        ];
    }
}
