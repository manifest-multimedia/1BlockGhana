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
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Permission;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
      //  $agents = User::where('role', 'agent')->get();
        $agents= User::all();
      //  return view('sbadmin.agents.lists',compact('agents'));
        return view('backend.agent.view',compact('agents'));
    }

    public function addAgent(){
        $packages = Package::all();
        $partners = BusinessType::all();
       // return view('sbadmin.agents.add',compact('packages','categories'));
        return view('backend.agent.add',compact('packages','partners'));
    }

    public function postAgent(Request $request){
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

    public function agentProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $partners = BusinessType::all();
      //  return view('sbadmin.agent.profile',compact('user'));
        return view('backend.agent.profile',compact('user','partners'));
    }

    public function agentProfileUpdate(Request $request, $id){

       // $id = Auth::user()->id;
        User::where('id',$id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->route('agent.profile')->with('success','Personal Information has been updated');
    }

    public function agentBusinessUpdate(Request $request, $id){
       // dd($request);

        $validated = $request->validate([
            'business_phone' => 'required|numeric',
            'business_email' => 'email',
            'business_description' => 'required',
        ]);
       // $id = Auth::user()->id;
        Business::updateOrCreate([
            'user_id' => $id,
        ],
        [
            'mobile' => $request->business_phone,
            'email' => $request->business_email,
            'package_id' => $request->package_id,
            'business_type_id' => $request->partner_id,
            'website' => $request->business_website,
            'description' => $request->business_description,
         ]);
        return redirect()->route('agent.profile')->with('success','Business Information has been updated');
    }
    public function agentProfileId($id){
        $user = User::find($id);
        $partners = BusinessType::all();
        return view('backend.agent.profile',compact('user','partners'));
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


           return redirect()->route('agent.profile')->with('success', 'Logo has been uploaded successfully');
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
