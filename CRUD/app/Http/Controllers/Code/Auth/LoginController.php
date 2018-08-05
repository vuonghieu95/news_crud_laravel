<?php

namespace App\Http\Controllers\Code\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 30/07/2018
 * Time: 16:54
 */
class LoginController extends Controller
{
    // get gui login
    public function getLogin()
    {
        return view('auth.login');
    }

    // login

    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login, true)) {
            $currentlogin = Auth::user();
            if ($currentlogin->role_type == config('config.admin.role_type')) {
                return redirect()->route('admin');
            }
            if ($currentlogin->role_type == config('config.superadmin.role_type')) {
                return redirect()->route('superadmin.index');
            }
        } else {
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('getLogin');
    }
}