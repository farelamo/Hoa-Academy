<?php

namespace App\Http\Requests\Admin\Blog\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryAddRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama category blog harus diisi',
            'name.max'      => 'maximal 50 character',
        ];
    }
}
