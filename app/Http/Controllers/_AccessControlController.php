<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class _AccessControlController extends Controller
{
    public function viewAccessControlList(){
        $users = User::get();
        $roles = Role::get();
        return view('backend.admin.access_control',compact('users','roles'));
    }

    public function updateAccessControlList(Request $request, $id){
        $validated = $request->validate([
            'role_id' => 'required|max:255'
        ]);

        $user = User::find($id);

        $user->roles()->detach();
        $user->assignRole($request->role_id);
        return redirect()->route('access.role.view')->with('toast_success','Role has been updated successfully');
    }
}
