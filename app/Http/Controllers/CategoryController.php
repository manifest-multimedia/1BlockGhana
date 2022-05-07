<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $categories = Category::orderBy('position')->get();
      //  return view('sbadmin.category.view', compact('categories'));
        return view('backend.category.list', compact('categories'));
    }

    public function create(){
        return view('backend.category.create');
    }

    public function store(Request $request){
       // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:categories|max:255',
            'position' => 'required',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'name.unique' => 'Category Name already exist.',
        ]
    );

        if ($validator->fails()) {
        return back()->with('error', $validator->messages()->all()[0])->withInput();
    }

        Category::create([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        return back()->with('success','New Category has been created successfully');
    }

    public function edit($id){
        //dd($category);
     $category =  Category::find($id);
     //dd($category);
      //  return view('sbadmin.category.edit', compact('category'));
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required|max:255',
        'position' => 'required|max:255',
    ]);


     Category::where('id',$id)->update([
        'name' => $request->name,
        'position' => $request->position,
     ]);
        return redirect()->route('category.list')->with('success','Category name has been updated successfully');
    }

    public function delete($id){

     $category =  Category::find($id);

     $category->delete();
     return redirect()->route('category.list')->with('success','Category has been successfully deleted');
    }
}
