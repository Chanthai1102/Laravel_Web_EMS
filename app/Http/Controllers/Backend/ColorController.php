<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    //
    public function view_color(){
        $color = Color::all();
        return view('Backend.view_color', ['color' => $color]);
    }
    public function add_color(){
        return view('Backend.add_color');
    }
    public function add_color_submit(Request $request){
        $name = $request -> name;
        Color::create([
           'name' => $name
        ]);
        return redirect('/admin/color-view');
    }
    public function edit_color($id){
        $color = Color::Where('id',$id)->first();
        return view('Backend.edit_color', ['color' => $color]);
    }
    public function edit_color_submit(Request $request){
        $id = $request -> id;
        $name = $request -> name;

        $color = Color::find($id);
        $color -> name = $name;
        $color -> save();

        return redirect('/admin/color-view');
    }
}
