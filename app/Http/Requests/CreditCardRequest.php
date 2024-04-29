<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
{
    
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'planId' => ['required'],

            'creditCardNumber' => [ 'required' ],
            'dateExpired' => [ 'required' ],

            'name' => [ 'required' ],
            'cvv' => [ 'required' ]
        ];
    }



    public function attributes()
    {
        return [
            'creditCardNumber' => 'numero do cartão',
            'dateExpired' => 'data de validade',

            'name' => 'nome',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio',
        ];
    }
}
