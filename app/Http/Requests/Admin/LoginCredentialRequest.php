<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginCredentialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login_id' => [
                'required',
                'exists:admins,login_id',
                'max:255',
                'string'
            ],
            'password' => [
                'required',
                'regex:/^[!-~]+$/',
                'between:3,255',
                'string',
                function ($attribute, $value, $fail) {
                    if (is_null(Admin::where('login_id', $this->login_id)->first()) || !Hash::check($value, Admin::where('login_id', $this->login_id)->value('password'))) {
                        $fail(':attributeが一致していません。');
                    }
                }
            ]
        ];
    }

    public function attributes(): array
    {
        return [
            'login_id' => 'ログインID',
            'password' => 'パスワード',
        ];
    }
}
