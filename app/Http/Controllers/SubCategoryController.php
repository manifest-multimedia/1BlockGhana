<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $subcategories = SubCategory::get();
        $categories = Category::where('type','development')->get();
        return view('backend.category.subcategory', compact('subcategories','categories'));
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:categories|max:255',
            'type' => 'required',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Sub Category Name already exist.',
        ]
    );

        if ($validator->fails()) {
        return back()->with('error', $validator->messages()->all()[0])->withInput();
    }

    SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return back()->with('success','New Sub Category has been created successfully');
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required|max:255',
    ]);


    SubCategory::where('id',$id)->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
     ]);
        return redirect()->route('sub.category.list')->with('success','Sub Category name has been updated successfully');
    }

    public function delete($id){

     $category =  SubCategory::find($id);

     $category->delete();
     return redirect()->route('sub.category.list')->with('success','Sub Category has been successfully deleted');
    }
}
