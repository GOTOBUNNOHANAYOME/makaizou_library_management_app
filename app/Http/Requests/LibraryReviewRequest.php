<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment' => [
                'required',
                'max:255',
                'string'
            ],
            'score'=> [
                'required',
                'min:0',
                'max:5',
                'numeric'
            ]
        ];
    }
}
