<?php

namespace App\Http\Requests\Admin\Vocabulary;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama harus diisi',
            'name.max'      => 'maximal nama adalah 100 characters'
        ];
    }
}
