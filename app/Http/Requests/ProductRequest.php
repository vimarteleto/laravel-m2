<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        $this->only('name', 'price', 'campaign_id', 'discount_id');
    }


    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'name' => ['required', 'max:255', 'min:2', 'unique:App\Models\Product,name'],
                'price' => ['required', 'numeric', 'digits_between:3,10'],
                'campaign_id' => ['exists:App\Models\Campaign,id', 'nullable'],
                'discount_id' => ['exists:App\Models\Discount,id', 'nullable'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2', 'unique:App\Models\Product,name'],
            'price' => ['numeric', 'digits_between:3,10'],
            'campaign_id' => ['exists:App\Models\Campaign,id', 'nullable'],
            'discount_id' => ['exists:App\Models\Discount,id', 'nullable'],
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
