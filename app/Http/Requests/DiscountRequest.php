<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class DiscountRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'name' => ['required', 'max:255', 'min:2'],
                'percentage' => ['required', 'max:100', 'min:0'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2'],
            'percentage' => ['max:100', 'min:0'],
        ];
    }

    public function messages()
    {
        return $this->messages->messages;
    }

    public function failedValidation(Validator $validator)
    {
        return response()->json($validator->errors(), 400);
    }
}
