<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function view(){
        $locations = Location::all();
        return view('backend.locations.list', compact('locations'));
    }

    public function create(){
        return view('backend.locations.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:locations,name|max:255',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Name already exist.',
        ]
        );

        Location::create([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return back()->with('success','New has been created successfully');
    }

    public function edit($id){
        $locations =  Location::find($id);
        return view('backend.locations.edit', compact('locations'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        Location::where('id',$id)->update([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return redirect()->route('location.list')->with('toast_success','Location name has been updated successfully');
    }

    public function delete($id){

     $locations = Location::find($id);

     $locations->delete();
     return redirect()->route('location.list')->with('success',' has been successfully deleted');
    }
}
