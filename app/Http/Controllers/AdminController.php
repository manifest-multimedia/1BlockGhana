<?php

namespace App\Http\Controllers;

use App\Mail\MailtrapAdmin;
use App\Mail\MailtrapExample;
use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function signUpRequest(Request $request){
      //  dd($request);

        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'email' => $request->email,
            'physical_address' => $request->physical_address,
        );
        //dd($data);
        Mail::to('admin@1blockghana.com')->send(new MailtrapAdmin($data));
        Mail::to($request->email)->send(new MailtrapExample($data));
       // return back()->with('success','Your request has been sent.');
        return redirect()->route('request.status');
    }


    //AMENITIES
    public function view(){
        $amenities = Amenities::all();
     //   return view('sbadmin.amenities.view', compact('amenities'));
        return view('backend.amenities.list', compact('amenities'));
    }

    public function create(){
        return view('backend.amenities.create');
    }

    public function store(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:amenities|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Amenity Name already exist.',
        ]
    );

        /* if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
    } */

    Amenities::create([
            'name' => $request->name,
        ]);

        return back()->with('success','New Amenity has been created successfully');
    }

    public function edit($id){
        //dd($amenities);
     $amenities =  Amenities::find($id);
     //dd($amenities);
        return view('backend.amenities.edit', compact('amenities'));
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required|max:255',
    ]);


    Amenities::where('id',$id)->update([
        'name' => $request->name,
     ]);
        return redirect()->route('amenity.list')->with('toast_success','Amenity name has been updated successfully');
    }

    public function delete($id){

     $amenities =  Amenities::find($id);

     $amenities->delete();
     return redirect()->route('amenity.list')->with('success','Amenity has been successfully deleted');
    }
}