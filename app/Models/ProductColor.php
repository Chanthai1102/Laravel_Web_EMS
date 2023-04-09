<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_color';

    protected $hidden = ['pivot'];
    public function name()
    {
//        return $this->belongsTo(Color::class);
//        return $this->hasMany(ProductColor::class, 'product_id');
        return $this->belongsTo(Color::class);
//        return $this->belongsToMany('App\Models\Color')->withPivot('color_id');
//        return $this->belongsToMany(Color::class, 'product_color');
    }
}
