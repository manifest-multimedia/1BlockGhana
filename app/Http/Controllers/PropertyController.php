<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\Business;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Properties;
use App\Models\Gallery;
use App\Models\PropertyAmenities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){     
       $properties = Auth::user()->properties;
        
      //  return view('backend.properties.list',compact('properties'));
        return view('backend.properties.grid',compact('properties'));
    }

    public function add(){
        $categories = Category::all();
        $amenities = Amenities::all();
        $currencies = Currency::all();
        $id = Auth::user()->id;
     //   return view('sbadmin.properties.add',compact('categories','amenities','currencies','id'));
        return view('backend.properties.add',compact('categories','amenities','currencies','id'));
    }

    public function store(Request $request, $id){
        $business = User::find($id)->business;

        $property =  Properties::create([
            'property_id'=> $request->id,
            'business_id'=> $business->id,
            'category_id'=> $request->category_id,
            'name'=> $request->name,
            'description'=> $request->description,
            'currency_id'=> $request->currency,
            'price'=> $request->price,
            'size'=> $request->size,
            'bedroom'=> $request->bedroom,
            'kitchen'=> $request->size,
            'size'=> $request->size,
            'purpose'=> $request->purpose,
            'location'=> $request->google_location,
            'date_built'=> $request->year_built,
            //'status'=> 1
        ]);

        foreach ($request->amenities as $amenity) {
            DB::insert('insert into amenities_properties (properties_id, amenities_id) values (?,?)', [$property->id,$amenity]);
        }
        

        if($request->hasFile('image')){
            $files =$request->file('image');
            foreach($files as $file){
               
                $name_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension());
                $file_name = $name_gen. '.'.$file_ext;
                $up_location = 'assets/properties/';
                $file_path = $up_location.$file_name;
                $file->move($up_location,$file_name);

                Gallery::create([
                    'path'=> $file_path,
                    'property_id' => $property->id                
                ]);
            }
        }

        return redirect()->route('property.view');
    }

    public function saveImage(Request $request){
        $image = $reques->file('file');
        $imageName = time. '.' .$image->extenssion();
        $image->move(public_path('properties'), $imageName);
        return response()->json(['success'=>$imageName]);
    }

    public function details($id){     
        $property = Properties::find($id);
         
        return view('backend.properties.details',compact('property'));
    }

}   