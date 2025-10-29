<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function deliveryArea()
    {
        return $this->belongsTo(DeliveryArea::class);
    }
}
