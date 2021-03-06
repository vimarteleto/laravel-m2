<?php

namespace App\Http\Requests;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CampaignRequest extends FormRequest
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        $this->replace($this->only('name'));

    }

    public function rules()
    {
        if($this->method() == 'POST') {
            return [
                'name' => ['required', 'max:255', 'min:2', 'unique:App\Models\Campaign,name'],
            ];
        }

        return [
            'name' => ['max:255', 'min:2', 'unique:App\Models\Campaign,name'],
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
