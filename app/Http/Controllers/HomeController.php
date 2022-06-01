<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Category;
use App\Models\Properties;
use App\Models\Development;
use App\Models\BusinessType;
use Illuminate\Http\Request;

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
        $businessType = BusinessType::where('name',$type)->get();
        //dd($businessType);
        foreach ($businessType as $busType) {
            $businesses = Business::where('business_type_id', $busType->id)->where('business_status','>=','1')->get();
        }
        //dd($businessType);
        return view('frontend.partner-listing', compact('businesses','type'));
    }

    public function categoryListing($id) {
        $category = Category::find($id);
        $category_name = $category->name;
        if($category->type == "property"){
            $properties = Properties::where('category_id',$id)->get();
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
}
