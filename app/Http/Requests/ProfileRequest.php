<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|max:225',
            'gender'        => 'required|in:man,woman',
            'age'           => 'required|numeric|min:10',
            'birth_date'    => 'required|date_format:Y-m-d',
            'profession'    => 'required|max:200',
            'address'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'nama harus diisi',
            'name.max'                  => 'maximal nama 225 karakter',
            'gender.required'           => 'jenis kelamin harus diisi',
            'gender.in'                 => 'jenis kelamin hanya pria/wanita',
            'age.required'              => 'usia harus diisi',
            'age.numeric'               => 'usia harus berupa angka',
            'age.min'                   => 'usia minimal 10 tahun',
            'birth_date.required'       => 'tanggal lahir harus diisi',
            'birth_date.date_format'    => 'format tanggal Y-m-d',
            'profession.required'       => 'profesi harus diisi',
            'profession.max'            => 'maximal profesi 200 karakter',
            'address.required'          => 'alamat harus diisi',
        ];
    }
}
