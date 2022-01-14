<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessLevelController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.accessLevel.index')->with(compact('roles'));
    }

    public function create()
    {
        $listOfPermission = config('custom.acl');
        return view('admin.accessLevel.cu')->with(compact('listOfPermission'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $roleReq = ['guard_name' => 'web', 'name' => $data['name']];
        $role = Role::create($roleReq);

        unset($data['name']);
        unset($data['_token']);

        foreach ($data as $key=>$permission){
            $perm = Permission::where('name', $key)->first();
            if ($perm == null){
                $perm = Permission::create([
                    'name' => $key
                ]);
            }
            $perm->assignRole($role);
        }

        HelperController::flash('success', 'درخواست با موفقیت اجراشد🙂 ');
        return redirect()->back();
    }

    public function edit($accessLevel)
    {
        $role = Role::find($accessLevel);

        $rpNames = [];
        foreach ($role->permissions as $key=> $rp){
            array_push($rpNames,$rp->name);
        }
        $listOfPermission = config('custom.acl');
        return view('admin.accessLevel.cu')->with(compact('listOfPermission', 'role', 'rpNames'));
    }

    public function update(Request $request)
    {
        $role = Role::find($request->accessLevel);
        $data = $request->all();
        $roleTitle = $data['name'];
        $role->revokePermissionTo(Permission::get()->pluck('name')->toArray());
        unset($data['name']);
        unset($data['_token']);
        unset($data['_method']);

        foreach ($data as $key=>$permission){
            $perm = Permission::where('name', $key)->first();
            if ($perm == null){
                $perm = Permission::create([
                    'name' => $key
                ]);
            }
            $perm->assignRole($role);
        }
        $data['name'] = $roleTitle;
        $role->update($data);


        HelperController::flash('success', 'درخواست با موفقیت اجراشد🙂 ');
        return redirect()->back();
    }
}
