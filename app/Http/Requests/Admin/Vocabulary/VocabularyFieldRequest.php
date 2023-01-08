<?php

namespace App\Http\Requests\Admin\Vocabulary;

use Illuminate\Foundation\Http\FormRequest;

class VocabularyFieldRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vocabulary_id'             => 'required',
            'vocabulary_category_id'    => 'required',
            'word'                      => 'required|max:100',
            'vocal'                     => 'required|max:100',
            'mean'                      => 'required|max:225',
        ];
    }

    public function messages()
    {
        return [
            'vocabulary_id.required'            => 'jenis vocabulary harus diisi',
            'vocabulary_id.exists'              => 'jenis vocabulary belum ada',
            'vocabulary_category_id.required'   => 'kategori vocabulary harus diisi',
            'vocabulary_category_id.exists'     => 'kategori vocabulary belum ada',
            'word.required'                     => 'contoh kata harus diisi',
            'word.max'                          => 'maximal contoh kata 100 karakter',
            'vocal.required'                    => 'contoh pelafalan harus diisi',
            'vocal.max'                         => 'maximal contoh pelafalan 100 karakter',
            'mean.required'                     => 'terjemahan vocab harus diisi',
            'mean.max'                          => 'maximal terjemahan vocab 100 karakter',
        ];
    }
}
