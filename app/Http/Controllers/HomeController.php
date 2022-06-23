<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use App\Models\Properties;
use App\Models\Development;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Mail\SendPartnerMail;
use App\Models\StaticBottomAds;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home() {

        /* if(auth()->user()){
            auth()->user()->assignRole('admin');
        } */
        $properties = Properties::where('adStatus','>=',1)->orderBy('adStatus')->get();
        $developments = Development::where('adStatus','>=',1)->orderBy('adStatus')->get();
        $categories = Category::get();
        $currencies = Currency::get();
        $statics = StaticBottomAds::get();
        return view('frontend.homepage', compact('properties','categories','developments','currencies','statics'));
    }

    public function searchFilter(Request $request) {
        // category | location | currency | min price | max price
        if($request->filled('category_id') && $request->filled('location') && $request->filled('currency_id') && $request->filled('min_price') && $request->filled('max_price') ){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '>=',$request->min_price);
                $properties = $properties->where('price', '<=',$request->max_price);
                $properties = $properties->where('location', 'LIKE',"%{$request->location}%");

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '<=',$request->min_price)
                                    ->orwhere('price', '>=',$request->max_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }
        }

        // category | location | currency | min price
        elseif($request->filled('category_id') && $request->filled('location') && $request->filled('currency_id') && $request->filled('min_price')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '>=',$request->min_price);
                $properties = $properties->where('location', 'LIKE',"%{$request->location}%");

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '<=',$request->min_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category | location | currency | max price
        elseif($request->filled('category_id') && $request->filled('location') && $request->filled('currency_id') && $request->filled('max_price')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '<=',$request->max_price);
                $properties = $properties->where('location', 'LIKE',"%{$request->location}%");

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '>=',$request->max_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category | currency | min price | max price
        elseif($request->filled('category_id') && $request->filled('currency_id') && $request->filled('min_price') && $request->filled('max_price')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '>=',$request->min_price);
                $properties = $properties->where('price', '<=',$request->max_price);

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '<=',$request->min_price)
                                    ->orwhere('price', '>=',$request->max_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category | location | currency
        elseif($request->filled('category_id') && $request->filled('location') && $request->filled('currency_id')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('location', 'LIKE',"%{$request->location}%");

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category | currency | min price
        elseif($request->filled('category_id') && $request->filled('currency_id') && $request->filled('min_price')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '>=',$request->min_price);
                $properties = $properties->where('location', 'LIKE',"%{$request->location}%");

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '<=',$request->min_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category | currency | max price
        elseif($request->filled('category_id') && $request->filled('currency_id') && $request->filled('max_price')){

            if(Properties::where('category_id',$request->category_id)){

                $properties = Properties::where('category_id',$request->category_id);
                $properties = $properties->where('currency_id',$request->currency_id);
                $properties = $properties->where('price', '<=',$request->max_price);

                $properties->get();

                $similar = Properties::where('category_id',[$request->category_id])
                                    ->orwhere('price', '>=',$request->max_price)->get();

                  return view('frontend.filter.properties', compact('properties','similar'));

            }elseif(Development::where('category_id',$request->category_id)){

                $developments = Development::where('category_id',$request->category_id)->orderBy('created_at')->get();
                return view('frontend.filter.developments', compact('categories','developments'));
            }

        }

        // category
        elseif($request->filled('category_id')){

            if(Properties::where('category_id',$request->category_id)){
                  $properties = Properties::where('category_id',$request->category_id)->get();

                 $similar = Properties::where('category_id','!=',$request->category_id)
                                      ->get();


                  return view('frontend.filter.properties', compact('properties','similar'));

              }elseif(Development::where('location', 'LIKE', '%'.$request->location.'%')){

                  $developments = Development::where('location', 'LIKE', '%'.$request->location.'%')->orderBy('created_at')->get();
                  return view('frontend.filter.developments', compact('categories','developments'));
              }
        }

        // location
        elseif($request->filled('location')){

                $properties = Properties::where('location', 'LIKE',"%{$request->location}%")->get();

                 $similar = Properties::where('location', 'NOT LIKE',"%{$request->location}%")
                                      ->get();
                  return view('frontend.filter.properties', compact('properties','similar'));

        }

        // min price
        elseif($request->filled('min_price') && $request->currency_id){

            $properties = Properties::where('price', '>=',"$request->min_price")
                                    ->where('currency_id', $request->currency_id)->get();

            $similar = Properties::where('price', '<=',"$request->min_price")
                                    ->where('currency_id', $request->currency_id)->get();

            return view('frontend.filter.properties', compact('properties','similar'));

        }

        // max price
        elseif($request->filled('max_price') && $request->currency_id){

            $properties = Properties::where('price', '<=',"$request->max_price")
                                    ->where('currency_id', $request->currency_id)->get();

            $similar = Properties::where('price', '<=',"$request->max_price")
                                    ->where('currency_id', $request->currency_id)->get();

            return view('frontend.filter.properties', compact('properties','similar'));
        }

        // bed
        elseif($request->filled('bed')){

            $properties = Properties::where('bedroom', '==',"$request->bed")->get();

             $similar = Properties::where('bedroom', '!=',"$request->min_price")->get();

              return view('frontend.filter.properties', compact('properties','similar'));

        }

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

    public function listingBySlug($slug) {

        if (Properties::where('slug',$slug)->first()) {
            $property = Properties::where('slug',$slug)->first();

            //SIMILAR PROPERTIES
            $similar = Properties::whereNotIn('slug', [$slug])->get();
           // dd($similar);
            return view('frontend.property-details', compact('property','similar'));
        }elseif(Development::where('slug',$slug)->first()){
            $development = Development::where('slug',$slug)->first();

            //SIMILAR PROPERTIES
            $similar = Development::whereNotIn('slug', [$slug])->get();
           // dd($similar);
           return view('frontend.development-details', compact('development','similar'));
        }

    }

    public function developmentBySlug($slug) {

        $development = Development::where('slug',$slug)->first();
        //SIMILAR PROPERTIES
        $similar = Development::whereNotIn('slug', [$slug])->get();
       // dd($similar);
        return view('frontend.development-details', compact('development','similar'));
    }

    public function userListing($type) {
        $users = User::role($type)->get();
      //  Business::all()->each->save();
        return view('frontend.partner-listing', compact('users','type'));
    }

    public function userSingleListing($slug) {
        $business = Business::where('slug',$slug)->first();
        return view('frontend.partner-single-listing', compact('business'));
    }

    public function categoryListing($slug) {
        $category = Category::where('slug',$slug)->first();
        $category_name = $category->name;
        if($category->type == "property"){
            $properties = Properties::where('category_id',$category->id)->latest()->get();
            //SIMILAR PROPERTIES
            $similar = Properties::whereNotIn('category_id', [$category->id])->get();
        // dd($similar);
            return view('frontend.category.properties', compact('properties','similar','category_name'));
        }elseif($category->type == "development"){

            $developments = Development::where('category_id',$category->id)->get();
           // dd($developments, $category);
            //SIMILAR PROPERTIES
            $similar = Development::whereNotIn('category_id', [$category->id])->get();
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

        $locations = District::select('name')->where('name','LIKE', '%'. $request->location. '%')->get();

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

    public function sendPartnerMail(Request $request, $slug){
        $property = Properties::where('slug',$slug)->first();
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
