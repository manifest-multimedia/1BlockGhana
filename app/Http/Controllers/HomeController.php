<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Category;
use App\Models\Properties;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        /* if(auth()->user()){
            auth()->user()->assignRole('admin');
        } */
        $properties = Properties::get();
      //  dd($properties);
        return view('frontend.homepage', compact('properties'));
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

    public function partnerListing($id) {

        $properties = Properties::where('category_id',$id)->get();

        $business_type = BusinessType::find($id)->name;
       // dd($similar);
        return view('frontend.partner-listing', compact('properties','business_type'));
    }

    public function categoryListing($id) {

        $properties = Properties::where('category_id',$id)->get();

        $category_name = Category::find($id)->name;
        //SIMILAR PROPERTIES
        $similar = Properties::whereNotIn('category_id', [$id])->get();
       // dd($similar);
        return view('frontend.category-listing', compact('properties','similar','category_name'));
    }

    public function agentListing($id) {
        //AGENT PROPERTIES
        $business = Business::find($id);

        //SIMILAR PROPERTIES
        $otherAgentsProperties = Properties::whereNotIn('business_id', [$id])->get();
        return view('frontend.agent-listing', compact('otherAgentsProperties','business'));
    }
}
