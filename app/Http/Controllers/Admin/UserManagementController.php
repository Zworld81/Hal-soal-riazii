<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function user()
    {
        $users = User::where('level', 1)->get();
        return view('admin.userManagement.index')->with(compact('users'));
    }
    public function admin()
    {
        $users = User::where('level', 0)->get();
        return view('admin.userManagement.index')->with(compact('users'));
    }
    public function teacher()
    {
        $users = User::where('level', 2)->get();
        return view('admin.userManagement.index')->with(compact('users'));
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('admin.userManagement.cu')->with(compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = User::find($request->user_id);

        if (!empty($user->roles))
            foreach ($user->roles as $role){
                $role = $user->roles->first()->name;
                $user->removeRole($role);
            }

        $role = Role::where('id', $data['role'])->first();
        $user->assignRole($role);

        HelperController::flash('success', 'درخواست با موفقیت اجراشد🙂 ');
        return redirect()->back();
    }
}
