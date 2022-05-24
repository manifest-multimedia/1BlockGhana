<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopAds;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewTopAds(){
        $topads = TopAds::orderBy('priority')->get();
        return view('backend.ads.top_ads.list',compact('topads'));
    }

    public function editTopAds($id){
        $topAd = TopAds::find($id);
        return view('backend.ads.top_ads.edit', compact('topAd'));
    }

    public function addTopAds(){
        $id = Auth::user()->id;
        return view('backend.ads.top_ads.add', compact('id'));
    }

    public function storeTopAds(Request $request, $id){
        $user = User::find($id);

        $topads = TopAds::create([
            'name'=> $request->name,
            'website'=> $request->website,
            'priority'=> $request->priority
        ]);


        $temporaryFile = TemporaryFile::where('folder', $request->adImage)->first();
        //dd($temporaryFile);
        if($temporaryFile){
            $topads->addMedia(storage_path('app/public/adImage/tmp/'. $request->adImage . '/' . $temporaryFile->filename))->toMediaCollection('topAds');

            rmdir(storage_path('app/public/adImage/tmp/'. $request->adImage));
            $temporaryFile->delete();
        }

        return redirect()->route('topads.view');

    }

    public function deleteTopAds($id){
       // dd($id);

        //Custom method findId has been declared in the TopAds Model
        TopAds::findId($id)->delete();

        return redirect()->route('topads.view');
    }

    public function uploadLogo(Request $request,$id){

        $user = User::find($id);

        $temporaryFile = TemporaryFile::where('folder', $request->adImage)->first();
        // dd($temporaryFile);
        if($temporaryFile){
            $user->addMedia(storage_path('app/public/adImage/tmp/'. $request->adImage . '/' . $temporaryFile->filename))->toMediaCollection('logos');

            rmdir(storage_path('app/public/adImage/tmp/' . $request->adImage));
            $temporaryFile->delete();
        }

    return redirect()->route('topads.view')->with('success', 'AdImage has been uploaded successfully');
    }


    public function viewFeaturedAds(){
        $featureds = Properties::select('id','name','adStatus')->where('adStatus', '>=' ,1)->get();
       // dd($featureds);
        return view('backend.ads.featured_ads.list',compact('featureds'));
    }

    public function addFeaturedAds(){
        $properties = Properties::select('id','name')->where('adStatus','<','1')->orWhere('adStatus', NULL)->get();
        return view('backend.ads.featured_ads.properties', compact('properties'));
    }

    public function storeFeaturedAds(Request $request, Properties $id){
        $id->update([
            'adStatus' => $request->priority,
        ]);

        return redirect()->route('featuredads.view')->with('success','FeaturedAd Priority  has been added');
    }
    public function updateFeaturedAds(Request $request, Properties $id){
        $id->update([
            'adStatus' => $request->priority,
        ]);

        return redirect()->route('featuredads.view')->with('success','FeaturedAd Priority  has been updated');
    }

    public function deleteFeaturedAds(Properties $id){
        $id->update([
            'adStatus' => 0,
        ]);

        return redirect()->route('featuredads.view')->with('success','Priority has been removed');
    }


}
