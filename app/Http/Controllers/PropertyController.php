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
use App\Models\Package;
use App\Models\TemporaryFile;
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

        return view('backend.properties.list',compact('properties'));
       // return view('backend.properties.grid',compact('properties'));
    }

    public function add(){
        $categories = Category::all();
        $amenities = Amenities::all();
        $currencies = Currency::all();
        $id = Auth::user()->id;
        $business = Business::where('user_id', $id)->get('package_id');
        //dd($business);
        foreach ($business as $bus) {
            $package = Package::find($bus->package_id);
            $bus_id = $bus->id;
        }
       // dd($package);
     //   return view('sbadmin.properties.add',compact('categories','amenities','currencies','id'));
        return view('backend.properties.add',compact('categories','amenities','currencies','id','package'));
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
            'bathroom'=> $request->bathroom,
            'kitchen'=> $request->size,
            'size'=> $request->size,
            'purpose'=> $request->purpose,
            'location'=> $request->location,
            'date_built'=> $request->year_built,
            //'status'=> 1
        ]);



        foreach ($request->amenities as $amenity) {
            DB::insert('insert into amenities_properties (properties_id, amenities_id) values (?,?)', [$property->id,$amenity]);
        }


        if($request->properties){
         //   dd('file is in');
           // $user = User::find($id);
            foreach($request->properties as $file){

                $temporaryFile = TemporaryFile::where('folder', $file)->first();
                // dd($file);
                    $tempPath = 'app/public/properties/tmp/';
                    if($temporaryFile){
                        $property->addMedia(storage_path($tempPath. $file . '/' . $temporaryFile->filename))->toMediaCollection('properties');

                        rmdir(storage_path($tempPath . $file));
                        $temporaryFile->delete();
                    }



               /*  $name_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension());
                $file_name = $name_gen. '.'.$file_ext;
                $up_location = 'assets/properties/';
                $file_path = $up_location.$file_name;
                $file->move($up_location,$file_name);

                Gallery::create([
                    'path'=> $file_path,
                    'property_id' => $property->id
                ]); */
            }
        }
        else{ dd($request);}

        return redirect()->route('property.view');
    }

    public function update(Request $request, $id){
      //  $business = User::find($id)->business;

        $property =  Properties::find($id);
           // 'property_id'=> $request->id,
          //  'business_id'=> $business->id,
          $property->category_id= $request->category_id;
          $property->name= $request->name;
          $property->description= $request->description;
          $property->currency_id= $request->currency;
          $property->price= $request->price;
          $property->size= $request->size;
          $property->bedroom= $request->bedroom;
          $property->bathroom= $request->bathroom;
          $property->kitchen= $request->size;
          $property->size= $request->size;
          $property->purpose= $request->purpose;
          $property->location= $request->location;
          $property->date_built= $request->year_built;
            //'status'=> 1
          $property->save();

        /* foreach ($request->amenities as $amenity) {
            DB::insert('insert into amenities_properties (properties_id, amenities_id) values (?,?)', [$property->id,$amenity]);
        } */

      //  dd($property);
        if($request->properties){

            foreach($request->properties as $file){

                $temporaryFile = TemporaryFile::where('folder', $file)->first();

                    $tempPath = 'app/public/properties/tmp/';
                    if($temporaryFile){
                        $property->clearMediaCollection('properties');
                        $property->addMedia(storage_path($tempPath. $file . '/' . $temporaryFile->filename))->toMediaCollection('properties');

                        rmdir(storage_path($tempPath . $file));
                        $temporaryFile->delete();
                    }



               /*  $name_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension());
                $file_name = $name_gen. '.'.$file_ext;
                $up_location = 'assets/properties/';
                $file_path = $up_location.$file_name;
                $file->move($up_location,$file_name);

                Gallery::create([
                    'path'=> $file_path,
                    'property_id' => $property->id
                ]); */
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
    public function edit($id){
        $categories = Category::all();
        $amenities = Amenities::all();
        $currencies = Currency::all();
        $property = Properties::find($id);
        $business = Business::where('user_id', $property->business->user_id)->get('package_id');
       // dd($business);
        foreach ($business as $bus) {
            $package = Package::find($bus->package_id);
           // dd($package);
            $bus_id = $bus->id;
        }
        return view('backend.properties.edit',compact('property','categories','amenities','currencies','package'));
    }

}
