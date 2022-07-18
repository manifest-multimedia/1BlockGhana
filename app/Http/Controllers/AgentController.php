<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use App\Models\Business;
use App\Models\Category;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Permission;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
      //  $partners = User::where('role', 'partner')->get();
        $partners= User::all();
      //  return view('sbadmin.partners.lists',compact('partners'));
        return view('backend.partners.view',compact('partners'));
    }

    public function addUser(){
        $packages = Package::all();
      //  $partners = BusinessType::all();
        $roles = Role::where('name','agent')->orwhere('name','developer')->get();

       // return view('sbadmin.partners.add',compact('packages','categories'));
        return view('backend.partners.add',compact('packages','roles'));
    }

    public function postPartner(Request $request){
        $request->validate(['email' => 'required|email|unique:users,email']);
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'physical_address' => $request->physical_address,
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Password::getRepository()->create($user);
        $user->sendPasswordResetNotification($token);



        $status = Password::sendResetLink($request->only('email'));
        //dd($status);
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);


    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $packages = Package::all();
        $roles = Role::whereNotIn('name', ['admin', 'super admin'])->get();
      //  $partners = BusinessType::all();
      //  return view('sbadmin.partner.profile',compact('user'));
        return view('backend.partners.profile',compact('user','roles','packages'));
    }

    public function userProfileId($id){
        $user = User::find($id);
        $packages = Package::all();
       // dd($packages);
        $roles = Role::whereNotIn('name', ['super admin'])->get();
        return view('backend.partners.profile',compact('user','roles','packages'));
    }

    public function userProfileUpdate(Request $request, $id){
        $user = User::find($id);
        $user_role = Auth::user()->roles->pluck('name')[0];
        if($user_role == 'admin' || $user_role == 'super admin'){
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->mobile = $request->phone;
            $user->email = $request->email;

            $user->save();

            /* Business::where('user_id', $id)->update([
                'business_type_id' => $id
            ]); */

            $user->syncRoles($request->role_name);

            return redirect()->back()->with('success','User Information has been updated');
        }
        // $id = Auth::user()->id;
        /* User::where('id',$id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->phone,
            'email' => $request->email,
        ]); */

        $user->mobile = $request->phone;
        $user->save();
        return redirect()->back()->with('success','Personal Information has been updated');
    }

    public function userBusinessUpdate(Request $request, $id){
      // $response = $this->authorize('update business','update all'); //SAME AS -> Gate::inspect('update business');


        $validated = $request->validate([
            'business_phone' => 'required|numeric',
            'business_email' => 'email',
            'business_description' => 'required',
        ]);

        if (Gate::inspect('update all')->allowed()) {
            Business::updateOrCreate([
                'user_id' => $id,
            ],
            [
                'name' => $request->business_name,
                'package_id' => $request->package_id,
                'mobile' => $request->business_phone,
                'email' => $request->business_email,
                'website' => $request->business_website,
                'description' => $request->business_description,
             ]);

            return redirect()->back()->with('success','Business Information has been updated');

            }
            else {
            Business::updateOrCreate([
                'user_id' => $id,
            ],
            [

                'mobile' => $request->business_phone,
                'email' => $request->business_email,
                'website' => $request->business_website,
                'description' => $request->business_description,
             ]);
            return redirect()->back()->with('success','Business Information has been updated');
        }


    }


    public function uploadLogo(Request $request,$id){

           $user = User::find($id);

           $temporaryFile = TemporaryFile::where('folder', $request->logo)->first();
       // dd($temporaryFile);
           if($temporaryFile){
               $user->addMedia(storage_path('app/public/logos/tmp/'. $request->logo . '/' . $temporaryFile->filename))->toMediaCollection('logos');

               rmdir(storage_path('app/public/logos/tmp/' . $request->logo));
               $temporaryFile->delete();
           }


           return redirect()->back()->with('success', 'Logo has been uploaded successfully');
    }


    public function fetchLogo($id){
        dd($id);
    }
    public function deleteLogo($id){
        dd($id);
    }

    public function userRole(){
        $roles = Role::all();
        $permissions = Permission::all();
        $partners = BusinessType::all();
        //dd($partners);
        return view('backend.admin.role', compact('partners','roles','permissions'));
    }

}
