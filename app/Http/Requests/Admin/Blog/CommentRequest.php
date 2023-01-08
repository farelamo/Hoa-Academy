<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|max:50'
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
