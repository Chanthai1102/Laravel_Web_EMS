<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function add_product(){
        $category = DB::table('category')
            ->orderBy('id', 'desc')
            ->get();
        $size = DB::table('size')
            ->orderBy('id', 'desc')
            ->get();
        $color = DB::table('color')
            ->orderBy('id', 'desc')
            ->get();
        return view('Backend.add_product', ['category' => $category, 'color' => $color, 'size'=> $size]);
    }
}
