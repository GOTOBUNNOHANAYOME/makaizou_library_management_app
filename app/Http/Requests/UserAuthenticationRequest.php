<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthenticationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'=> [
                'required',
                'email:filter',
                'unique:users,email',
                'max:255',
                'string',
                'confirmed'
            ],
        ];
    }
    public function attributes(): array
    {
        return [
            'email'=> 'メールアドレス',
        ];
    }
}
