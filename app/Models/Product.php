<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name',
        'cate_id',
        'regular_price',
        'sale_price',
        'description',
        'thumbnail',
        'viewer',
        'thumbnail',
    ];


    protected $hidden = ['pivot'];
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color', 'product_id', 'color_id');
    }
    public function sizes(){
        return $this->belongsToMany(Size::class, 'productsize', 'product_id', 'size_id');
    }
}
