<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SmtpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mail_mailer'   => [
                'required',
                'string',
                'max:255',
            ],
            'mail_host'     => [
                'required',
                'string',
                'max:255',
            ],
            'mail_port'     => [
                'required',
                'string',
                'max:4',
            ],
            'mail_username' => [
                'required',
                'string',
                'max:255',
            ],
            'mail_password' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
