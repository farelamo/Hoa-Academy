<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidator extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'email|required',
            'password'  => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'email.email'       => 'Invalid, not an email format',
            'email.required'    => 'The email is required',
            'password.required' => 'The password is required',
            'password.max'      => 'The maximum allowed password is 8 characters',
        ];
    }
}
