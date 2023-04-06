<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function view_category(){
        $category = Category::all();
        return view('Backend.view_category',['category'=> $category]);
    }
    public function add_category(){
        return view('Backend.add_category');
    }
    public function add_category_submit(Request $request){
        $name = $request->name;
        Category::create([
            'name' => $name
        ]);
        return redirect('/admin/category-add');
    }
    public function edit_category($id){
        $category = Category::where('id',$id)->first();
        return view('Backend.edit_category', ['category'=>$category]);
    }
    public function edit_category_submit(Request $request){
        $id = $request->id;
        $name = $request->name;

        $category = Category::find($id);
        $category -> name = $name;
        $category -> save();

        return redirect('/admin/category-view');
    }
}
