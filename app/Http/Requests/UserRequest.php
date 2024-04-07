<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Prefecture;
use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Enum\Rules\EnumValue;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if(!is_null($this->phone_number))
        $this->merge([
            'phone_number' => str_replace('-', '', $this->phone_number)
        ]);
    }
    public function rules(): array
    {
        return [
            'image'=> [
                'required',
                'file',
                'image',
                'mimes:jpg,gif,png,webp',
                'max:2048'
            ],
            'name'=> [
                'required',
                'max:40',
                'string'
            ],
            'gender' => [
                'required',
                'integer',
                new EnumValue(Gender::class,false)
            ],
            'birthday' => [
                'required',
                'before:today',
                'date'
            ],
            'phone_number' => [
                'required',
                'regex:/^[0-9]{3}-?[0-9]{4}-?[0-9]{4}$/',
                'unique:users,phone_number',
                'string',
            ],
            'prefecture' => [
                'required',
                'integer',
                new EnumValue(Prefecture::class,false)
            ],
            'password' => [
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
            'name' => '氏名',
            'gender' => '性別',
            'birthday' => '誕生日',
            'phone_number' => '電話番号',
            'prefecture' => '都道府県',
            'password' => 'パスワード',
            'image' => '画像ファイル'
        ];
    }
}
