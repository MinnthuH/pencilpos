<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // All Permission Method
    public function AllPermission()
    {

        $permission = Permission::all();
        return view('backend.permission.all_permission', compact('permission'));
    } // End Method

    // Add Permission Method
    public function AddPermission()
    {

        return view('backend.permission.add_permission');
    } // End Method

    // Store Permission Method
    public function StorePermission(Request $request)
    {

        $role = Permission::create([
            'name' => $request->permissionName,
            'group_name' => $request->gorupName,
        ]);
        $noti = [
            'message' => 'Permission Add Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#permission')->with($noti);
    } // End Method

    // Edit Permission Method
    public function EditPermission($id)
    {

        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit_permission', compact('permission'));
    } // End Method

    // Update Permission Method
    public function UpdatePermission(Request $request)
    {

        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name' => $request->permissionName,
            'group_name' => $request->gorupName,
        ]);
        $noti = [
            'message' => 'Permission Update Add Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#permission')->with($noti);
    } // End Method

    // Delete Permission Method
    public function DeletePermission($id)
    {

        Permission::findOrFail($id)->delete();
        $noti = [
            'message' => 'Permission Delete  Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#permission')->with($noti);
    } // End Method


    /////////  Role  ////////

    // All Roles Method
    public function AllRoles()
    {

        $roles = Role::all();
        return view('backend.roles.all_roles', compact('roles'));
    } // End Method

    // Add Role Method
    public function AddRoles(){

        return view('backend.roles.add_roles');
    } // End Method

    // Store Role Method
    public function StoreRole(Request $request)
    {

        Role::create([
            'name' => $request->roleName,
        ]);
        $noti = [
            'message' => 'Role Add Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#roles')->with($noti);
    } // End Method

     // Edit Role Method
     public function EditRoles($id)
     {

         $roles = Role::findOrFail($id);
         return view('backend.roles.edit_roles', compact('roles'));
     } // End Method

     // Update Role Method
    public function UpdateRoles(Request $request)
    {

        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->roleName,

        ]);
        $noti = [
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#roles')->with($noti);
    } // End Method

    // Delete Permission Method
    public function DeleteRole($id)
    {

        Role::findOrFail($id)->delete();
        $noti = [
            'message' => 'Role Deleted  Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all#roles')->with($noti);
    } // End Method



}
