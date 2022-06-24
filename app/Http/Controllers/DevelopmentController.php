<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use App\Models\Business;
use App\Models\Category;
use App\Models\Amenities;
use App\Models\Development;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DevelopmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
       $developments = Auth::user()->developments;
        return view('backend.developments.list',compact('developments'));
    }

    public function add(){
        $subcategories = SubCategory::get();
        $amenities = Amenities::all();
        $id = Auth::user()->id;
        $business = Business::where('user_id', $id)->get('package_id');
        foreach ($business as $bus) {
            $package = Package::find($bus->package_id);
            $bus_id = $bus->id;
        }
        return view('backend.developments.add',compact('subcategories','amenities','id','package'));
    }

    public function store(Request $request, $id){
        $business = User::find($id)->business;

        $subcategory = SubCategory::find($request->sub_category_id);


        $development =  Development::create([
            'business_id'=> $business->id,
            'category_id'=> $subcategory->category_id,
            'sub_category_id'=> $request->sub_category_id,
            'category_id'=> $request->sub_category_id,
            'name'=> $request->name,
            'description'=> $request->description,
            'location'=> $request->location,
        ]);

        foreach ($request->amenities as $amenity) {
            DB::insert('insert into amenities_development (development_id, amenities_id) values (?,?)', [$development->id,$amenity]);
        }

        if($request->banner){
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $development->addMedia($file)->toMediaCollection('development_banner');
            }
        }

        if($request->developments){
            foreach($request->developments as $file){
                $temporaryFile = TemporaryFile::where('folder', $file)->first();

                $tempPath = 'app/public/developments/tmp/';
                if($temporaryFile){

                    $development->addMedia(storage_path($tempPath. $file . '/' . $temporaryFile->filename))->toMediaCollection('developments');

                    rmdir(storage_path($tempPath . $file));
                    $temporaryFile->delete();
                }
            }
        }

        return redirect()->route('development.view');
    }

    public function details($id){
        $development = Development::find($id);
        return view('backend.developments.details',compact('development'));
    }

    public function edit($id){
        $subcategories = SubCategory::get();
        $amenities = Amenities::all();
        $development = Development::find($id);
        $business = Business::where('user_id', $development->business->user_id)->get('package_id');
       // dd($business);
        foreach ($business as $bus) {
            $package = Package::find($bus->package_id);
           // dd($package);
            $bus_id = $bus->id;
        }
        foreach($development->amenities as $amens){
            $development_amenities[] = $amens->id;
        }
      //  dd($development_amenities);
        return view('backend.developments.edit',compact('development','subcategories','amenities','development_amenities','package'));
    }

    public function update(Request $request, $id){
        /* if (! Gate::allows('update-development', $development)) {
            abort(403);
        } */

        $subcategory = SubCategory::find($request->category_id);

        $development =  Development::find($id);
          $development->category_id= $subcategory->category_id;
          $development->sub_category_id= $request->category_id;
          $development->name= $request->name;
          $development->description= $request->description;
          $development->location= $request->location;
            //'status'=> 1
          $development->save();

          //Delete old amenities
          DB::insert('delete from amenities_development where development_id =' .$development->id);
        // Insert new amenities
          foreach ($request->amenities as $amenity) {
            DB::insert('insert into amenities_development (development_id, amenities_id) values (?,?)', [$development->id,$amenity]);
        }

        if($request->banner){
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $development->clearMediaCollection('development_banner');
                $development->addMedia($file)->toMediaCollection('development_banner');
            }
        }

      //  dd($development);
        if($request->developments){
            $development->clearMediaCollection('developments');
            foreach($request->developments as $file){
                $temporaryFile = TemporaryFile::where('folder', $file)->first();
                    $tempPath = 'app/public/developments/tmp/';
                    if($temporaryFile){
                        $development->addMedia(storage_path($tempPath. $file . '/' . $temporaryFile->filename))->toMediaCollection('developments');

                        rmdir(storage_path($tempPath . $file));
                        $temporaryFile->delete();
                    }

            }
        }


        return redirect()->route('development.view');
    }


    public function delete($id){
        Development::find($id)->delete();
        return redirect()->route('development.view')->with('success','Development has been deleted');
    }


}
