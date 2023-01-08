<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'blogCat'   => 'required|exists:blog_categories,id',
            'title'     => 'required|max:100',
            'desc'      => 'required|max:12000',
            'shortDesc' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'blogCat.required'    => 'category blog harus diisi',
            'blogCat.exists'      => 'category blog belum ada',
            'title.required'      => 'judul blog harus diisi',
            'title.max'           => 'maximal 100 character',
            'desc.required'       => 'deskripsi blog harus diisi',
            'desc.max'            => 'maximal 12000 character',
            'shortDesc.required'  => 'deskripsi singkat blog harus diisi',
            'shortDesc.max'       => 'maximal 100 character',
        ];
    }
}
