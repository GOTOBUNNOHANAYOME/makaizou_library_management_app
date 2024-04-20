<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MailSendRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'   => [
                'required',
                'max:255',
                'string'
            ],
            'content' => [
                'required',
                'string',
            ]
        ];
    }

    public function attributes(): array
    {
        return [
            'title'   => 'タイトル',
            'content' => 'メール本文'
        ];
    }
}
