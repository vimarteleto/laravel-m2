<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CityRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        $this->only('name', 'group_id');
    }

    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'name' => ['required', 'max:255', 'min:2'],
                'group_id' => ['required', 'exists:App\Models\Group,id'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2'],
            'group_id' => ['exists:App\Models\Group,id'],
        ];
    }

    public function messages()
    {
        return $this->messages->messages;
    }

    public function failedValidation(Validator $validator)
    {
        response()->json(['succes' => 'false', 'data' => $validator->errors()], 404);
    }
}
