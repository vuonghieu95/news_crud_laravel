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
        if (!Auth::check()) {
            return view('auth.login');
        } else {
            return redirect()->route('admin');
        }
    }

    // login

    public function postLogin(LoginRequest $request)
    {

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($login)){
            return redirect()->route('admin');
        }else{
            return redirect()->back();
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('getLogin');
    }
}