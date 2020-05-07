<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'id', 'text',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Tag')->using('App\ProductTag');
    }
}
