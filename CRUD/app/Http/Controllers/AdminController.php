<?php

namespace App\Http\Controllers;

use App\Model\Entities\Admin;

class AdminController extends Controller
{
    public function index(){

        $viewDatas = [
            'admins' => Admin::all()
        ];

        return view('auth.admin')->with($viewDatas);
    }
}
