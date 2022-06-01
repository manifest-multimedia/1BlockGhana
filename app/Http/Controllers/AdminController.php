<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Amenities;
use App\Models\Properties;
use App\Mail\MailTrapAdmin;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Mail\MailtrapExample;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function dashboard() {
        if(auth()->user()->user_type =='admin'){
        $activeBusiness = Business::where('business_status', '>=', 1)->count();
        $suspendedBusiness = Business::where('business_status', '<', 1)->count();
        $totProperties = Properties::count();
        return view('backend.admin.dashboard',compact('activeBusiness','suspendedBusiness','totProperties'));
        }
        $business = auth()->user()->business;
        return view('backend.index',compact('business'));
    }
    public function signUpRequest(Request $request){

        $business_type = BusinessType::find($request->partner_id)->name;

        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'business_name' => $request->business_name,
            'partners' => $business_type,
            'email' => $request->email,
            'physical_address' => $request->physical_address,
        );

        //live email
        Mail::to('info@1blockghana.com')->send(new MailtrapAdmin($data));

        //test email
       // Mail::to('admin@1blockghana.com')->send(new MailtrapAdmin($data));

        return redirect()->route('request.status');
    }


    //AMENITIES
    public function viewAmenities(){
        $amenities = Amenities::all();
     //   return view('sbadmin.amenities.view', compact('amenities'));
        return view('backend.amenities.list', compact('amenities'));
    }

    public function createAmenity(){
        return view('backend.amenities.create');
    }

    public function storeAmenity(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:amenities,name|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Amenity Name already exist.',
        ]
    );

    Amenities::create([
            'name' => $request->name,
        ]);

        return back()->with('success','New Amenity has been created successfully');
    }

    public function editAmenity($id){
     $amenities =  Amenities::find($id);
        return view('backend.amenities.edit', compact('amenities'));
    }

    public function updateAmenity(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);


    Amenities::where('id',$id)->update([
        'name' => $request->name,
     ]);
        return redirect()->route('amenity.list')->with('toast_success','Amenity name has been updated successfully');
    }

    public function deleteAmenity($id){

     $amenities =  Amenities::find($id);

     $amenities->delete();
     return redirect()->route('amenity.list')->with('success','Amenity has been successfully deleted');
    }


    //BUSINESS TYPES
    public function viewBusinessTypes(){
        $business_types = BusinessType::select('id','name','position')->orderBy('position')->get();
        return view('backend.business_type.list', compact('business_types'));
    }


    public function storeBusinessType(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:business_type,name|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Business type already exist.',
        ]
    );

        BusinessType::create([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return back()->with('success','New Partner Type has been created successfully');
    }

    public function editBusinessType($id){
     $business_types =  BusinessType::find($id);
        return view('backend.busines_type.edit', compact('business_types'));
    }

    public function updateBusinessType(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);


    BusinessType::where('id',$id)->update([
        'name' => $request->name,
     ]);
        return redirect()->route('business.type.list')->with('toast_success','Business Type has been updated successfully');
    }

    public function deleteBusinessType($id){

     $partners =  BusinessType::find($id);

     $partners->delete();
     return redirect()->route('business.type.list')->with('success','Business Type has been successfully deleted');
    }

}
