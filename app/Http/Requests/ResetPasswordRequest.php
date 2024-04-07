<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'password'=> [
                'required',
                'between:8,255',
                'regex:/^[!-~]+$/',
                'string',
                'confirmed'
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'password'=> 'パスワード'
        ];
    }
}
