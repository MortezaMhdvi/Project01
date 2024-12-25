<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [
        'barcode_ie', 'build_phase_id', 'title'
    ];

    public function barcode()
    {
        return $this->belongsTo(Barcode::class);
    }

    public function build_phase()
    {
        return $this->belongsTo(BuildPhase::class);
    }

    public function product_details(){
        return $this->hasMany(ProductDetails::class);
    }
}
