<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductTag;
use App\Product;

class Tag extends Model
{
    protected $fillable = [
        'id', 'text',
    ];

    public function products()
    {
        // return $this->belongsToMany(Product::class)->using(ProductTag::class);
    }
}
