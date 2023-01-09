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
            'date'      => 'required|date_format:Y-m-d',
            'time'      => 'required|date_format:H:i',
            'course_id' => 'required|exists:courses,id',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required'    => 'course harus dipilih',
            'course_id.exists'      => 'course belum ada',
            'date.required'         => 'tanggal absensi harus diisi',
            'date.date_format'      => 'format tanggal absensi Y-m-d',
            'time.required'         => 'waktu absensi harus diisi',
            'time.date_format'      => 'format waktu absensi 00:00',
        ];
    }
}
