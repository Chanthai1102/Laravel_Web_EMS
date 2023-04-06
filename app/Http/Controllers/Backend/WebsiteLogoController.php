<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteLogo;

class WebsiteLogoController extends Controller
{
    public function websitelogo(){
        $website_logo = Websitelogo::all();
        return view('backend.view_websitelogo' ,['website_logo' => $website_logo]);
    }
    public function add_websitelogo(){
        return view('Backend.add_websitelogo');
    }
    public function add_websitelogo_submit(Request $request){
        $request -> validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $thumbnail = $request -> thumbnail;
        $filename = rand(1,999).'-'.$thumbnail->getClientOriginalName();
        $path = 'Uploads';
        $thumbnail -> move($path,$filename);
        WebsiteLogo::create([
            'thumbnail' => $filename,
        ]);
        return redirect('/admin/websitelogo-add');
    }
    public function edit_websitelogo($id){
        $websitelogo = WebsiteLogo::where('id',$id)->first();
        return view('Backend.edit_websitelogo',['websitelogo'=>$websitelogo]);
    }
    public function edit_websitelogo_submit(Request $request){
        $id = $request -> id;
        $thumbnail = $request -> file('thumbnail');
        $file_name = rand(1,999).'-'.$thumbnail->getClientOriginalName();
        $path = 'Uploads';
        $thumbnail -> move($path,$file_name);

        $websitelogo = WebsiteLogo::find($id);
        $websitelogo -> thumbnail = $file_name;
        $websitelogo ->save();
        redirect('/admin/websitelogo');
    }
}
