<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DiscountRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        $this->only('name', 'percentage');
    }

    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'name' => ['required', 'max:255', 'min:2', 'unique:App\Models\Discount,name'],
                'percentage' => ['required', 'max:100', 'min:0'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2', 'unique:App\Models\Discount,name'],
            'percentage' => ['max:100', 'min:0'],
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
