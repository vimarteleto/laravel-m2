<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        $this->replace($this->only('username', 'password'));
    }

    public function authenticate()
    {
        if (!Auth::attempt($this->all())) {

            $response = response()->json(['message' => 'Credenciais inválidas!'], 401);
            throw new HttpResponseException($response);
        }
    }

    public function rules()
    {
        if($this->route()->uri() == 'api/register') {
            return [
                'username' => ['required', 'max:20', 'min:3', 'unique:App\Models\User,username'],
                'password' => ['required', 'max:20', 'min:5'],
            ];
        }

        $this->authenticate();

        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return $this->messages->messages;
    }

    public function failedValidation(Validator $validator)
    {
        $response = response()->json(['succes' => 'false', 'data' => $validator->errors()], 404);
        throw new HttpResponseException($response);
    }
}
