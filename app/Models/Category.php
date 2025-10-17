<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function brands() {
        return $this->hasMany(Brand::class, 'category_id');
    }

    public function products() {
        return $this->hasManyThrough(
            Product::class,
            Brand::class,
            'category_id',
            'brand_id',
            'id',
            'id'
        );
    }
}
