<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    //
    public function view_size(){
        $size = Size::all();
        return view('Backend.view_size',['size'=> $size]);
    }
    public function add_size(){
        return view('Backend.add_size');
    }
    public function add_size_submit(Request $request){
        $name = $request->name;
        Size::create([
           'name' => $name
        ]);
        return redirect('/admin/size-add');
    }
    public function edit_size($id){
        $size = Size::Where('id',$id)->first();
        return view('Backend.edit_size',['size'=>$size]);
    }
    public function edit_size_submit(Request $request){
        $id = $request -> id;
        $name = $request -> name;

        $size = Size::find($id);
        $size -> name = $name ;
        $size -> save();

        return redirect('/admin/size-view');
    }
}
