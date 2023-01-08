<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'desc'          => 'required',
            'type'          => 'required|in:regular,business',
            'hsk_type'      => 'required|in:1,2,3,4,5,6',
            'business_type' => 'required_if:type,business',
            'level'         => 'required|integer|min:1',
            'meet_times'    => 'required|integer|min:1',
            'duration'      => 'required|integer|min:1',
            'price'         => 'required|numeric|min:0',
            'group_link'    => 'required',
            'meet_link'     => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'nama harus diisi',
            'title.max'                 => 'maximal nama adalah 100 karakter',
            'short_desc.required'       => 'deskripsi singkat harus diisi',
            'short_desc.max'            => 'maximal deskripsi singkat adalah 100 karakter',
            'desc.required'             => 'deskripsi harus diisi',
            'type.required'             => 'tipe kelas harus diisi',
            'type.in'                   => 'tipe kelas harus dipilih',
            'hsk_type.required'         => 'tipe hsk harus diisi',
            'hsk_type.in'               => 'tipe hsk tidak ada',
            'business_type.required_if' => 'tipe bisnis harus diisi',
            'level.required'            => 'level harus diisi',
            'level.integer'             => 'level harus berupa angka',
            'level.min'                 => 'minimal level 1',
            'meet_times.required'       => 'kali pertemuan harus diisi',
            'meet_times.integer'        => 'kali pertemuan harus berupa angka',
            'meet_times.min'            => 'minimal 1x pertemuan',
            'duration.required'         => 'durasi kelas harus diisi',
            'duration.integer'          => 'durasi kelas harus berupa angka',
            'duration.min'              => 'minimal durasi kelas 1 jam',
            'price.required'            => 'harga kelas harus diisi',
            'price.numeric'             => 'harga kelas harus berupa angka',
            'price.min'                 => 'minimal harga kelas 0 rupiah (free)',
            'group_link.required'       => 'link grup harus diisi',
            'meet_link.required'        => 'link meet harus diisi',
        ];
    }
}
