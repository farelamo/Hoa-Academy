<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidator extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'              => 'required|max:200|regex:/^[A-Za-z\d\s\.]*$/',
            'email'             => 'email|required|unique:users,email',
            'password'          => 'required|max:8',
            'age'               => 'required|numeric',
            'gender'            => 'required|in:man,woman',
            'birth_date'        => 'required|date_format:Y-m-d',
            'address'           => 'required',
            'profession'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'The name is required',
            'name.max'                  => 'The maximum allowed name is 200 characters',
            'name.regex'                => 'The name field only contain alphabet',
            'email.email'               => 'Invalid, not an email format',
            'email.required'            => 'The email is required',
            'email.unique'              => 'The email was taken by another user',
            'password.required'         => 'The password is required',
            'password.max'              => 'The maximum allowed password is 8 characters',
            'gender.required'           => 'The gender is required',
            'gender.in'                 => 'The gender type doesnt match with our data',
            'age.required'              => 'The age is required',
            'age.numeric'               => 'The age field only contain numeric',
            'birth_date.required'       => 'The birth date is required',
            'birth_date.date_format'    => 'Invalid, not a date format',
            'address.required'          => 'The address is required',
            'profession.required'       => 'The profession is required',
        ];
    }
}
