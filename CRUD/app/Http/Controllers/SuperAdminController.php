<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Model\Entities\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->key) {
            $superadmins = Admin::WHERE('username', 'LIKE', '%' . $request->key . '%')->get();
            return view('auth.admin',compact('superadmins'));
        } else {
            $viewDatas = [
                'superadmins' => Admin::paginate(5)
            ];
            return view('auth.admin')->with($viewDatas);
        }
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store(AdminCreateRequest $request)
    {
        $admin = new Admin();
        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
            $file->move('img', $filename);
            $dir = 'img/' . $filename;
        }
        $admin->avatar = $dir ? $dir : '';  // img/tenfile.png
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
        $superadmin = Admin::findorfail($id);
        return view('auth.edit', compact('superadmin'));
    }

    public function update(AdminCreateRequest $request, $id)
    {
        $superadmin = Admin::findorfail($id);

        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
            $file->move('img', $filename);
            $dir = 'img/' . $filename;
        }

        $superadmin->avatar = $dir ? $dir : '';  // img/tenfile.png
        $superadmin->username = $request->username;
        $superadmin->email = $request->email;
        $superadmin->role_type = $request->role_type;
        $superadmin->password = bcrypt($request->password);
        $superadmin->ins_id = Auth::user()->id;
        $superadmin->save();
//        $superadmin->update($request->all());
        return redirect()->route('superadmin')->with('update', 'User updated successfully');
    }

}
