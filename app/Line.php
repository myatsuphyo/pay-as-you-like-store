<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Line extends Model
{
    protected $fillable = [
        'id', 'product_id', 'text', 'page_no'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
