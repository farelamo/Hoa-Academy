<?php

namespace App\Http\Requests\User\Absensi;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'code'      => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required'    => 'course harus dipilih',
            'course_id.exists'      => 'course belum ada',
            'code.required'         => 'kode harus diisi',
            'code.numeric'          => 'kode harus berupa angka',
            'code.min'              => 'minimal kode adalah 0',
        ];
    }
}
