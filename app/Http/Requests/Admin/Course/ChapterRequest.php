<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => 'required|max:100',
            'short_desc'    => 'required|max:150',
            'content'       => 'required',
            'ordinal'       => 'required|numeric|min:1',
            'course_id'     => 'required|exists:courses,id',

        ];
    }

    public function messages()
    {
        return [
            'title.required'      => 'nama harus diisi',
            'title.max'           => 'maximal nama adalah 100 karakter',
            'short_desc.required' => 'deskripsi singkat harus diisi',
            'short_desc.max'      => 'maximal deskripsi singkat adalah 100 karakter',
            'content.required'    => 'content harus diisi',
            'ordinal.required'    => 'urutan chapter harus diisi',
            'ordinal.numeric'     => 'urutan chapter harus berupa angka',
            'ordinal.min'         => 'minimal urutan chapter harus 1',
            'course_id.required'  => 'course harus dipilih',
            'course_id.exists'    => 'course yang dipilih tidak ada',
        ];
    }
}
