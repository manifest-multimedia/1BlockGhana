<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopAds;
use App\Models\Properties;
use App\Models\Development;
use App\Models\StaticTopAds;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\StaticBottomAds;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // SLIDER TOP ADS
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


    // FEATURED PROPERTIES ADS
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

    // FEATURED DEVELOPMENT ADS
    public function viewFeaturedDevelopments(){
        $featureds = Development::select('id','name','featuredStatus')->where('featuredStatus', '>=' ,1)->orderBy('featuredStatus')->get();
       // dd($featureds);
        return view('backend.ads.featured_development.list',compact('featureds'));
    }

    public function addFeaturedDevelopment(){
        $developments = Development::select('id','name')->where('featuredStatus','<','1')->get();
        return view('backend.ads.featured_development.developments', compact('developments'));
    }

    public function storeFeaturedDevelopment(Request $request, Development $id){
        $id->update([
            'featuredStatus' => $request->priority,
        ]);

        return redirect()->route('featured.development.view')->with('success','Featured Priority  has been added');
    }

    public function updateFeaturedDevelopment(Request $request, Development $id){
        $id->update([
            'featuredStatus' => $request->priority,
        ]);

        return redirect()->route('featured.development.view')->with('success','Featured Priority  has been updated');
    }

    public function deleteFeaturedDevelopment(Development $id){
        $id->update([
            'featuredStatus' => 0,
        ]);

        return redirect()->route('featured.development.view')->with('success','Priority has been removed');
    }


    // DEVELOPMENT BANNER ADS
    public function viewDevelopmentAds(){
        $developmentads = Development::select('id','name','adStatus')->where('adStatus', '>=' ,1)->get();
       // dd($featureds);
        return view('backend.ads.development_ads.list',compact('developmentads'));
    }

    public function addDevelopmentAds(){
        $developments = Development::select('id','name')->where('adStatus','<','1')->orWhere('adStatus', NULL)->get();
        return view('backend.ads.development_ads.developments', compact('developments'));
    }

    public function storeDevelopmentAds(Request $request, Development $id){
        $id->update([
            'adStatus' => $request->priority,
        ]);

        return redirect()->route('developmentads.view')->with('success','Development Ad Priority  has been added');
    }
    public function updateDevelopmentAds(Request $request, Development $id){
       // dd($request->priority);
        $id->update([
            'adStatus' => $request->priority,
        ]);

        return redirect()->route('developmentads.view')->with('success','Development Ad Priority  has been updated');
    }

    public function deleteDevelopmentAds(Development $id){
        $id->update([
            'adStatus' => 0,
        ]);

        return redirect()->route('developmentads.view')->with('success','Priority has been removed');
    }


    // STATIC TOP ADS
    public function viewStaticTopAds(){
        $staticAd1 = StaticTopAds::find(1);
        $staticAd2 = StaticTopAds::find(2);
        return view('backend.ads.static_top_ads.list',compact('staticAd1','staticAd2'));
    }

    public function storeStaticTopAds(Request $request, $id){

        if($id == 1){

            $static = StaticTopAds::updateOrCreate(
                ['id' => 1,],
                [
                    'name'=>'banner',
                    'website' => $request->website,
                    'property_id' => $request->property_id,
                    'link_type' => $request->link_type,
                    'priority' => '1'
                ]
            );

            if($request->banner){
                if ($request->hasFile('banner')) {
                    $file = $request->file('banner');
                    $static->clearMediaCollection('static_top');
                    $static->addMedia($file)->toMediaCollection('static_top');
                }
            }
        }elseif($id == 2){
            $static = StaticTopAds::updateOrCreate(
                ['id' => 2,],
                [
                    'name'=>'banner2',
                    'website' => $request->website,
                    'property_id' => $request->property_id,
                    'link_type' => $request->link_type,
                    'priority' => '1'
                ]
            );

            if($request->banner2){
                if ($request->hasFile('banner2')) {
                    $file = $request->file('banner2');
                    $static->clearMediaCollection('static_top');
                    $static->addMedia($file)->toMediaCollection('static_top');
                }
            }
        }


        return redirect()->back()->with('success','Saved.');
    }

    public function deleteStaticTopAds(Development $id){
        $id->update([
            'adStatus' => 0,
        ]);

        return redirect()->route('developmentads.view')->with('success','Priority has been removed');
    }

    // STATIC BOTTOM ADS
    public function viewStaticBottomAds(){
        $staticAds = StaticBottomAds::orderBy('priority','ASC')->get();
        return view('backend.ads.static_bottom_ads.list',compact('staticAds'));
    }

    public function addStaticBottomAds(){
        return view('backend.ads.static_bottom_ads.add');
    }

    public function storeStaticBottomAds(Request $request){

        $static = StaticBottomAds::create([
            'name'=> 'static ad',
            'website'=> $request->website,
            'property_id' => $request->property_id,
            'link_type' => $request->link_type,
            'priority'=> $request->priority
        ]);

        if($request->banner){
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $static->clearMediaCollection('static_bottom');
                $static->addMedia($file)->toMediaCollection('static_bottom');
            }
        }


        return redirect()->route('static.bottomads.view')->with('success','Saved.');
    }

    public function editStaticBottomAds($id){
        $staticAd = StaticBottomAds::find($id);
        return view('backend.ads.static_bottom_ads.edit', compact('staticAd'));
    }

    public function updateStaticBottomAds(StaticBottomAds $id, Request $request){
        $id->update([
            'name'=> 'static ad',
            'website'=> $request->website,
            'property_id' => $request->property_id,
            'link_type' => $request->link_type,
            'priority'=> $request->priority
        ]);

        return redirect()->back()->with('success','Saved.');
    }

    public function uploadStaticBottomAds(StaticBottomAds $id, Request $request){
        if($request->banner){
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $id->clearMediaCollection('static_bottom');
                $id->addMedia($file)->toMediaCollection('static_bottom');
            }
        }

        return redirect()->back()->with('success','Saved.');
    }

    public function deleteStaticBottomAds(StaticBottomAds $id){
        $id->delete();

        return redirect()->route('static.bottomads.view')->with('success','Ad has been removed');

    }
}
