<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use App\Models\Properties;
use App\Models\Development;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Mail\SendPartnerMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home() {

        /* if(auth()->user()){
            auth()->user()->assignRole('admin');
        } */
        $properties = Properties::where('adStatus','>=',1)->orderBy('adStatus')->get();
        $categories = Category::get();
        return view('frontend.homepage', compact('properties','categories'));
    }

    public function listing() {
        $properties = Properties::get();
        return view('frontend.listing', compact('properties'));
    }

    public function listingByHouses() {

        $category = Category::where('id',1)->first();
        //dd($category->id);
        $properties = Properties::get();
       // dd($properties);
       // $properties = Properties::get();
        return view('frontend.listing', compact('properties'));
    }

    public function listingById($id) {

        $property = Properties::find($id);
        //SIMILAR PROPERTIES
        $similar = Properties::whereNotIn('id', [$id])->get();
       // dd($similar);
        return view('frontend.property-details', compact('property','similar'));
    }

    public function developmentById($id) {

        $development = Development::find($id);
        //SIMILAR PROPERTIES
        $similar = Development::whereNotIn('id', [$id])->get();
       // dd($similar);
        return view('frontend.development-details', compact('development','similar'));
    }

    public function userListing($type) {
        $users = User::role($type)->get();
      
        return view('frontend.partner-listing', compact('users','type'));
    }

    public function categoryListing($id) {
        $category = Category::find($id);
        $category_name = $category->name;
        if($category->type == "property"){
            $properties = Properties::where('category_id',$id)->latest()->get();
            //SIMILAR PROPERTIES
            $similar = Properties::whereNotIn('category_id', [$id])->get();
        // dd($similar);
            return view('frontend.category.properties', compact('properties','similar','category_name'));
        }elseif($category->type == "development"){
            $developments = Development::where('category_id',$id)->get();
            //SIMILAR PROPERTIES
            $similar = Development::whereNotIn('category_id', [$id])->get();
        // dd($similar);
            return view('frontend.category.developments', compact('developments','similar','category_name'));
        }




    }

    public function agentListing($id) {
        //AGENT PROPERTIES
        $business = Business::find($id);

        //SIMILAR PROPERTIES
        $otherAgentsProperties = Properties::whereNotIn('business_id', [$id])->get();
        return view('frontend.agent-listing', compact('otherAgentsProperties','business'));
    }


    public function autocompleteLocation(Request $request){

        $locations = Properties::select('name')->where('name','LIKE', '%'. $request->location. '%')->get();

        return response()->json($locations);
    }

    public function accountSuspended(){
        if(auth()->user()){
            if(auth()->user()->business->business_status < 1){
                $account = auth()->user()->business;
                return view('frontend.message-suspension', compact('account'));
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function sendPartnerMail(Request $request, $id){
        $property = Properties::find($id)->first();
      //  dd($property->business->user->firstname);

        $data = array(
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'property_name' => $property->name,
            'property_id' => $property->property_id,
            'property_owner' => $property->business->user->firstname,
          //  'physical_address' => $request->business->user->firstname,
        );

        //live email
        Mail::to($property->business->email)->bcc('info@1blockghana.com')->send(new SendPartnerMail($data));

        return redirect()->back()->with('success','Your message has been sent to the partner');
    }
}
