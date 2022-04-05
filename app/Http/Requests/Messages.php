<?php

namespace App\Http\Requests;

class Messages
{
    public $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'name.unique' => 'O nome :input já está cadastrado no sistema',
        'min' => 'O valor :attribute deve ter no mínimo :min caracteres',
        'max' => 'O campo :attribute deve ter no máximo :max caracteres',
        'exists' => 'O registro :input não existe no sistema',
    ];
}