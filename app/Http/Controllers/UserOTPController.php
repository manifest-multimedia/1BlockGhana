<?php

namespace App\Http\Controllers;

use App\Mail\MailtrapAdmin;
use App\Mail\MailtrapExample;
use App\Mail\OTPMail;
use App\Models\Business;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\OTPNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class UserOTPController extends Controller
{
    public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitAgentForm(Request $request)
      {
          //dd($request);
          $request->validate([
              'email' => 'required|email|unique:users,email',
              'business_name' => 'required|unique:businesses,name',
          ]);

          $token = Str::random(64);
          $email = $request->email;
          DB::table('password_resets')->upsert(
            //values to insert or update
            [
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ],
            //column(s) that uniquely identify records within the associated table
            ['email' ],
            //array of columns that should be updated if a matching record already exists in the database
            [
                'token' => $token,
                'created_at' => Carbon::now()
              ],);

           // dd($request);
           $package = Package::find($request->package_id);

           $data = [
               'firstname' => $request->firstname,
               'email' => $request->email,
               'package'=> $package->name,
               'url' =>  route('reset.password.get', ['token'=>$token,'email'=>$email]),
           ];
          // dd($data['url']);
           Mail::to($request->email)->send(new OTPMail($data));
        $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'physical_address' => $request->physical_address,
                'email' => $request->email,
                'role' => 'agent',
                'password' => Hash::make('1blockghana')
            ]);

        foreach (User::where('email', $request->email)->cursor() as $agent) {
            Business::create([
                'user_id' => $agent->id,
                'name' =>  $request->business_name,
                'mobile' => $request->business_phone,
                'email' => $request->business_email,
                'category_id' => $request->category_id,
                'package_id' => $request->package_id,
            ]);
        }

          return redirect()->route('agent.add')->with('toast_success', 'Registration Link has been sent to the agent email');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showAgentResetPasswordForm($token,$email) {
         return view('backend.agent.passwordReset', ['token' => $token,'email'=>$email]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitAgentResetPasswordForm(Request $request)
      {

          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('message', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect()->route('agent.profile')->with('toast_success', 'Your password has been updated!');
      }
}
