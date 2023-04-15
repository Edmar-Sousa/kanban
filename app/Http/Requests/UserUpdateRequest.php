<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'username' => ['min:3', 'max:40'],
            'image'    => ['image', 'mimes:png,jpg']
        ];
    }


    public function messages() 
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'email'    => 'Informe um email valido.',

            'min' => 'O campo :attribute deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no maximo :max caracteres.',
        ];
    }


    public function attributes() 
    {
        return [
            'username' => 'usuario',
            'password' => 'senha',
        ];
    }
}
