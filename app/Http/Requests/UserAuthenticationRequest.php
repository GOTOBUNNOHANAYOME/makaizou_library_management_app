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
                'unique:users,email',
                'max:255',
                'string',
                'confirmed'
            ],
        ];

        $rule = match($this->type) {
            AuthenticationType::CREATE_USER => 'unique:users,email',
            AuthenticationType::RESET_PASSWORD => 'exists:users.email',
        };

        array_push($rules['email'], $rule);

        return $rules;
    }
    public function attributes(): array
    {
        return [
            'email'=> 'メールアドレス',
        ];
    }
}
