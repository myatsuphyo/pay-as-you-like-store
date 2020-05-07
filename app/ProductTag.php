<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Pivot
{
    protected $fillable = [
        'product_id', 'text_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
