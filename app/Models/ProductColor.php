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
        return $this->belongsTo(Color::class);
    }
}
