<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Prefecture;
use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Enum\Rules\EnumValue;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => [
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
            'prefecture' => [
                'required',
                'integer',
                new EnumValue(Prefecture::class,false)
            ],
        ];

        if(!is_null($this->image)){
            $rule = [
                'required',
                'file',
                'image',
                'mimes:jpg,gif,png,webp',
                'max:2048'
            ];
            array_push($rules["image"], $rule);
        }
        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name'         => '氏名',
            'gender'       => '性別',
            'birthday'     => '誕生日',
            'prefecture'   => '都道府県',
            'image'        => '画像ファイル'
        ];
    }
}
