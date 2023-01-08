<?php

namespace App\Http\Requests\Admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'     => 'required|max:100',
            'desc'      => 'required|max:12000',
            'short_desc'=> 'required|max:250',
            'date'      => 'required|date_format:Y-m-d',
            'start'     => 'required|date_format:H:i',
            'end'       => 'required|date_format:H:i|after:start',
            'max'       => 'required|numeric|min:1',
            'type'      => 'required|numeric',
            'meet_type' => 'required|numeric|in:1,2',
            'link'      => 'required_if:meet_type,1',
            'location'  => 'required_if:meet_type,2',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'judul event harus diisi',
            'title.max'             => 'maximal 100 character',
            'desc.required'         => 'deskripsi event harus diisi',
            'desc.max'              => 'maximal 12000 character',
            'short_desc.required'   => 'deskripsi singkat event harus diisi',
            'short_desc.max'        => 'maximal 250 character',
            'date.required'         => 'tanggal event harus diisi',
            'date.date_format'      => 'format tanggal Y-m-d',
            'start.required'        => 'jam awal harus diisi',
            'start.date_format'     => 'format jam awal 00:00',
            'end.required'          => 'jam berakhir harus diisi',
            'end.date_format'       => 'format jam berakhir 00:00',
            'end.after'             => 'jam berakhir harus lebih dari jam awal',
            'max.required'          => 'maximal peserta harus diisi',
            'max.numeric'           => 'maximal peserta harus berupa angka',
            'max.min'               => 'event tidak boleh kurang dari 1 peserta',
            'type.required'         => 'tipe event harus diisi',
            'type.numeric'          => 'tipe event harus berupa angka',
            'meet_type.required'    => 'tipe pertemuan harus diisi',
            'meet_type.numeric'     => 'tipe pertemuan harus berupa angka',
            'meet_type.in'          => 'tipe pertemuan harus diisi',
            'link.required_if'      => 'link event harus diisi',
            'location.required_if'  => 'lokasi event harus diisi',
        ];
    }
}
