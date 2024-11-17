<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:users,email'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'exists' => 'O :attribute informado não existe.'
        ];
    }
}
