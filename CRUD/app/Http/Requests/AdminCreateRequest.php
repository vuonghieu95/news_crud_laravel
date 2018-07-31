<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 31/07/2018
 * Time: 14:07
 */
class AdminCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(Request $request)
    {
       // $param = $request ->all();
        $rules = [
            'avatar' => 'required',
            'username' =>  'bail|required',
            'email' =>  'bail|required|email|max:128',
            'password' =>  'bail|required|confirmed|max:64',
            'password_confirmation' =>'required',
         //   'image' => 'bail|required|max:2048'
        ];

        return $rules;
    }
}