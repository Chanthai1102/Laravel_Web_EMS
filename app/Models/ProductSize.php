<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'productsize';

    protected $hidden = ['pivot'];

    public function name()
    {
        return $this->belongsTo(Size::class);
    }
}
