<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'phase_build_id', 'title', 'code'
    ];

    public function phase_profile()
    {
        return $this->belongsTo(PhaseProfile::class);
    }

    public function product_details()
    {
        return $this->hasMany(ProductDetails::class);
    }
}
