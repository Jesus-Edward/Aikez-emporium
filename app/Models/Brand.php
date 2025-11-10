<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
