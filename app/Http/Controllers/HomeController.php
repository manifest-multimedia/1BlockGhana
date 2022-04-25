<?php

namespace App\Http\Controllers;
use App\Models\Properties;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
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
}
