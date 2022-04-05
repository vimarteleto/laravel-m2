<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class GroupRequest extends FormRequest
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
                'name' => ['required', 'max:255', 'min:2', 'unique:App\Models\Group,name'],
                'campaign_id' => ['exists:App\Models\Campaign,id', 'nullable'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2'],
            'campaign_id' => ['exists:App\Models\Campaign,id', 'nullable'],
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
