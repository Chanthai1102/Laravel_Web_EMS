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
    public function add_product_submit(Request $request){
        $name = $request -> name;
        $regular_price = $request -> regular_price;
        $sale_price = $request -> sale_price;
        $category = $request -> category;
        $description = $request -> description;

        $thumbnail   = $request->file('thumbnail');
        $file_name   = rand(1 ,999).'-'.$thumbnail->getClientOriginalName();
        $path        = 'uploads';
        $thumbnail->move($path ,$file_name);

        //Create
        $product = new Product();
        $product->name = $name;
        $product->cate_id = $category;
        $product->regular_price = $regular_price;
        $product->sale_price = $sale_price;
        $product->description = $description;
        $product->viewer = 0;
        $product->thumbnail= $file_name;
        $product->save();

        // Save Forieng
        $product->colors()->attach($request->color);
        $product->sizes()->attach($request->size);
        $product->save();

        return redirect('/admin/product-view');
    }
    public function view_product(){
        $products = Product::with('colors', 'sizes')->get();
        return view('backend.view_product', ['products' => $products]);
    }
}
