<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQAnswer extends Model
{
    protected $guarded = [];

    public function faq()
    {
        return $this->belongsTo(FAQQuestion::class, 'question_id', 'id');
    }
}
