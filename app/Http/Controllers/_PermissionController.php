<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
class _PermissionController extends Controller
{
     //PERMISSION
     public function viewPermission(){
        $permissions = Permission::get();
        $roles = Role::get();
        return view('backend._permission.list', compact('permissions','roles'));
    }


    public function storePermission(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'permission_name' => 'required|unique:permission,name|max:255',
            'role_name' => 'required|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
        ]
        );

        $role = Role::where('name',$request->role_name)->first();

        $permission = Permission::create([
            'name' => $request->permission_name,
            'guard_name'=> 'web'
        ]);

        $permission->assignRole($role);

        return back()->with('success','New Permission has been created successfully');
    }


    public function updatePermission(Request $request, $name){
        $validated = $request->validate([
            'permission_name' => 'required|max:255'
        ]);

        $permission = Permission::where('name',$name)->first();

       // dd($permission,$id);
        foreach ($request->role_name as $name) {
            $role = Role::where('name',$name)->first();

            $role->givePermissionTo($permission);
        }




        return redirect()->route('permission.list')->with('toast_success','Permission has been updated successfully');
    }

    public function revokePermission(Request $request, $name){

        $permission = Permission::where('name',$name)->first();

       // dd($permission,$id);
        foreach ($request->role_name as $name) {
            $role = Role::where('name',$name)->first();

            $permission->removeRole($role);
        }

        return redirect()->route('permission.list')->with('toast_success','Permission has been updated successfully');
    }

    public function deletePermission($id){

     $permission =  Permission::find($id);

     $user_assigned_permission = User::permission($permission->id)->count();
     if(!$user_assigned_permission){
        $permission->delete();
        return redirect()->route('permission.list')->with('success','Permission has been successfully deleted');
     }

     return redirect()->route('permission.list')->with('warning','Assigned permission cannot be deleted');
    }

}
