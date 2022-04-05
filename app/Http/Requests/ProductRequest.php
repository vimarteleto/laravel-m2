<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProductRequest extends FormRequest
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
                'name' => ['required', 'max:255', 'min:2', ],
                'price' => ['required', 'numeric', 'digits_between:3,10'],
                'campaign_id' => ['exists:App\Models\Campaign,id', 'nullable'],
                'discount_id' => ['exists:App\Models\Discount,id', 'nullable'],
            ];
        }

        return [
            'name' => ['max:255', 'min:', ],
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
        return response()->json($validator->errors(), 400);
    }
}
