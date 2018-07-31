<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'bail|required|email|max:128',
            'password' => 'bail|required|max:64'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập Email!',
            'email.email' =>"Email không đúng định dạng!",
            'email.max' =>'Email tối đa 128 kí tự!',
            'password.required'  => 'Vui lòng nhập Password!',
            'password.max' =>'Password tối đa 128 kí tự!'
        ];
    }
}
