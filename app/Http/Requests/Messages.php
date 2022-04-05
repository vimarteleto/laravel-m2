<?php

namespace App\Http\Requests;

class Messages
{
    public $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'unique' => 'O atributo :attribute já está cadastrado no sistema',
        'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
        'max' => 'O campo :attribute deve ter no máximo :max caracteres',
        'exists' => 'O campo :attribute não existe no sistema',
    ];
}