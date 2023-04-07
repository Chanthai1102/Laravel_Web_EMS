<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'cate_id',
        'regular_price',
        'sale_price',
        'color',
        'size',
        'description',
        'thumbnail',
        'viewer',
        'thumbnail',
    ];
}
