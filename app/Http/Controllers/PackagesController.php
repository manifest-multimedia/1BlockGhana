<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $packages = Package::all();
        /* alert()->question('Are you sure you want to delete this Package?','You won\'t be able to revert this!')
        ->showConfirmButton('Yes! Delete it', '#3085d6')
        ->showCancelButton('Cancel', '#aaa')->reverseButtons(); */
       // return view('sbadmin.packages.view', compact('packages'));
        return view('backend.packages.list', compact('packages'));
    }

    public function create(){
        return view('backend.packages.create');
    }

    public function store(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:packages|max:255',
            'type' => 'required',
            'imageLimit' => 'required',

        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Package Name already exist.',
        ]
    );

        if ($validator->fails()) {
       // return back()->with('error', $validator->messages()->all()[0])->withInput();
    }
       // $totalLimit = $request->imageLimit + $request->videouploadlimit;

        Package::create([
            'name' => $request->name,
            'type' => $request->type,
            'image_upload_limit' => $request->imageLimit,
        ]);

        return redirect()->route('package.list')->with('success','Package updated successfully');
    }

    public function edit($id){
        //dd($package);
     $package =  Package::find($id);
     //dd($package);
      //  return view('sbadmin.packages.edit', compact('package'));
        return view('backend.packages.edit', compact('package'));
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required|max:255',
        'type' => 'required',
        'imageLimit' => 'required',

    ]);


  // $totalLimit = $request->imageLimit + $request->videouploadlimit;

     Package::where('id',$id)->update([
        'name' => $request->name,
        'type' => $request->type,
        'image_upload_limit' => $request->imageLimit,
     ]);
        return redirect()->route('package.list')->with('success','Package updated successfully');
    }

    public function delete($id){
     $package =  Package::find($id);

     $package->delete();
     return redirect()->route('package.list')->with('success','Package has been successfully deleted');
    }
}
