<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
