<?php

namespace App\Http\Requests\Admin\Blog\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nameEdit' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'nameEdit.required' => 'nama category blog harus diisi',
            'nameEdit.max'      => 'maximal 50 character',
        ];
    }
}
