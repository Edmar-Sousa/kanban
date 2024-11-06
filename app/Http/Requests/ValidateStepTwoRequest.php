<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStepTwoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'username' => ['required', 'min:3', 'max:40'],
            'document' => ['required'],
            'phone'    => ['required']
        ];
    }


    public function messages() 
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',

            'min' => 'O campo :attribute deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no maximo :max caracteres.',
        ];
    }


    public function attributes() 
    {
        return [
            'username' => 'usuario',
            'document' => 'cpf',
            'phone' => 'telefone',
        ];
    }
}
