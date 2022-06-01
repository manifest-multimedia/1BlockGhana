<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
class _RoleController extends Controller
{
    //ROLE
    public function viewRole(){
        $roles = Role::get();
        return view('backend._role.list', compact('roles'));
    }


    public function storeRole(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:role,name|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Role name already exist.'
        ]
    );

        Role::create([
            'name' => $request->name,
            'guard_name'=> 'web'
        ]);

        return back()->with('success','New Role has been created successfully');
    }


    public function updateRole(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);


    Role::where('id',$id)->update([
        'name' => $request->name,
        'guard_name' => 'web',
     ]);
        return redirect()->route('role.list')->with('toast_success','Role has been updated successfully');
    }

    public function deleteRole($id){

     $role =  Role::find($id);

     $user_assigned_role = User::role($role->id)->count();
     if(!$user_assigned_role){
        $role->delete();
        return redirect()->route('role.list')->with('success','Role has been successfully deleted');
     }

     return redirect()->route('role.list')->with('warning','Assigned roles cannot be deleted');
    }
}
