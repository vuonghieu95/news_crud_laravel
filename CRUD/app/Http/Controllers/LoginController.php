<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class LoginController extends Controller

{
    // lấy giao diện login
    public function getLogin()
    {
        if (!Auth::check()){
            return view('auth.login');
        }else{
            return redirect()->route('admin');
        }
    }

    public function postLogin(LoginRequest $loginRequest)
    {
        $login = [
            'username' => $loginRequest->username,
            'password' => $loginRequest->password,
            'level' => 1
        ];

        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect()->route('admin');
        } else {
            return redirect()->back();
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
