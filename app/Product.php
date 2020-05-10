<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Line;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'author', 'isbn', 'price', 'units', 'image', 'description'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function lines() 
    {
        return $this->hasMany(Line::class);
    }
}
