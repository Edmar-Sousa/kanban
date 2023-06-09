<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id'     => ['exists:task_boards,id'],
            'title'  => ['required', 'min:3'],
            'description' => ['required'],
        ];
    }


    public function attributes()
    {
        return [
            'title' => 'tarefa',
            'description' => 'descrição'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'min'      => 'O campo :attribute deve ter no minimo :min caracteres.',
        ];
    }
}
