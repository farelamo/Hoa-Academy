<?php

namespace App\Http\Requests\Admin\Absensi;

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
            'time'      => 'required|date_format:H:i',
            
        ];
    }

    public function messages()
    {
        return [
            'time.required'         => 'waktu absensi harus diisi',
            'time.date_format'      => 'format waktu absensi 00:00',
        ];
    }
}
