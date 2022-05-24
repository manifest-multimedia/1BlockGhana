<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Amenities;
use App\Models\Properties;
use App\Mail\MailtrapAdmin;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Mail\MailtrapExample;
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
        $business = auth()->user()->business;;
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

       // Mail::to('info@1blockghana.com')->send(new MailtrapAdmin($data));
        Mail::to('info@1blockghana.com')->send(new MailtrapAdmin($data));
       // Mail::to($request->email)->send(new MailtrapExample($data));
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

    //PARTNERS TYPES
    public function viewPartners(){
        $partners = BusinessType::select('id','name','position')->orderBy('position')->get();
        return view('backend.partners.list', compact('partners'));
    }


    public function storePartner(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:business_type|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Partner type already exist.',
            'position.unique' => 'Position number already exist.',
        ]
    );

        BusinessType::create([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return back()->with('success','New Partner Type has been created successfully');
    }

    public function editPartner($id){
        //dd($amenities);
     $partner =  BusinessType::find($id);
     //dd($amenities);
        return view('backend.partners.edit', compact('partner'));
    }

    public function updatePartner(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
        ]);


    BusinessType::where('id',$id)->update([
        'name' => $request->name,
        'position' => $request->position,
     ]);
        return redirect()->route('partner.list')->with('toast_success','Partner Type has been updated successfully');
    }

    public function deletePartner($id){

     $partners =  BusinessType::find($id);

     $partners->delete();
     return redirect()->route('partner.list')->with('success','Partner Type has been successfully deleted');
    }
}
