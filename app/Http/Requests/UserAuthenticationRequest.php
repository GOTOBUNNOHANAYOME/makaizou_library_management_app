<?php

namespace App\Http\Requests;

use App\Enums\AuthenticationType;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthenticationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        $rules =  [
            'email'=> [
                'required',
                'email:filter',
                'max:255',
                'string',
                'confirmed'
            ],
        ];

        $rule = (int)$this->authentication_type === AuthenticationType::CREATE_USER ? 'unique:users,email' : 'exists:users,email';
        array_push($rules['email'], $rule);

        return $rules;
    }
    public function attributes(): array
    {
        return [
            'email' => 'メールアドレス',
        ];
    }
}
