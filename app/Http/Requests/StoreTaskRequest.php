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
            'date_start' => ['date', 'after:now'],
            'date_end' => ['date', 'after:date_start'],
        ];
    }


    public function attributes()
    {
        return [
            'title' => 'tarefa',
            'description' => 'descrição',
            'date_start' => 'data de inicio',
            'date_end' => 'data de fim',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'min'      => 'O campo :attribute deve ter no minimo :min caracteres.',
            'date'     => 'O campo :attribute deve ser uma data valida',

            'date_start.after' => 'O campo deve ser posterio a data atual',
            'date_end.after' => 'O campo deve ser posterior a data de inicio'
        ];
    }
}
