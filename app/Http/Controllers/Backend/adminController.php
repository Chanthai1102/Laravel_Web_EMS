<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function admin(){
        return view('Backend.admin');
    }
}
