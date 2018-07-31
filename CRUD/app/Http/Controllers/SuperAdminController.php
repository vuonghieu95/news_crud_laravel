<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Model\Entities\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index()
    {
        $viewDatas = [
            'superadmins' => Admin::all()
        ];
        return view('auth.admin')->with($viewDatas);
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store(AdminCreateRequest $request)
    {
        $admin = new Admin();
        $admin->avatar = $request->avatar;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->role_type = $request->role_type;
        $admin->password = bcrypt($request->password);
        $admin->ins_id = Auth::user()->id;
        $admin->save();
        $request->session()->flash('success', 'Record successfully added!');
        return redirect()->route('superadmin');
    }

    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return redirect()->route('superadmin')->with(['delete' => 'User deleted successfully']);
    }

    public function edit($id)
    {
            $superadmins= Admin::findorfail($id);

        return view('auth.edit',compact('superadmins'));
    }
}
