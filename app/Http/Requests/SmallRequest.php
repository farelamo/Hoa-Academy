<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmallRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'     => 'mimes:jpg,jpeg,png|max:5048',
            'password'  => 'max:8',
        ];
    }

    public function messages()
    {
        return [
            'password.max'      => 'maximal password 8 karakter',
            'image.mimes'       => 'format gambar harus berupa JPG, PNG atau JPEG',
            'image.max'         => 'maximal gambar adalah 5 mb',
        ];
    }
}
