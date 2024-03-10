<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required', 'min:3', 'max:40'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:40'],
            'document' => ['required'],
            'phone'    => ['required'],
            'image'    => ['required', 'mimes:png,jpg'],
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
            'email'    => 'e-mail',
            'password' => 'senha',
            'document' => 'cpf',
            'phone'    => 'telefone',
            'image'    => 'imagem',
        ];
    }
}
