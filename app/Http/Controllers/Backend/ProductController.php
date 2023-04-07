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
        $color = implode(", ",$request->color);
        $size  = implode(", ",$request->size);
        $description = $request -> description;

        $thumbnail   = $request->file('thumbnail');
        $file_name   = rand(1 ,999).'-'.$thumbnail->getClientOriginalName();
        $path        = 'uploads';
        $thumbnail->move($path ,$file_name);

        Product::create([
            'name'          => $name,
            'cate_id'       => $category,
            'regular_price' => $regular_price,
            'sale_price'    => $sale_price,
            'color'         => $color,
            'size'          => $size,
            'description'   => $description,
            'thumbnail'     => $thumbnail,
            'viewer'        => 0,
            'thumbnail'     => $file_name,
        ]);

        return redirect('admin/product-add');
    }
    public function view_product(){
        $products = DB::table('product')
            ->join('category', 'product.cate_id', '=', 'category.id')
            ->join('color', 'product.color', '=', 'color.id')
            ->join('size', 'product.size', '=', 'size.id')
            ->select('product.*', 'category.name as cate_name', 'color.name as color_name', 'size.name as size_name')
            ->orderBy('product.id', 'desc')
            ->get();

        return view('backend.view_product', ['product' => $products]);
    }
}
