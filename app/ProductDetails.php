<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = [
        'product_id', 'label_id', 'phase_id', 'machine_id', 'enable'
    ];

    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    public function build_phase()
    {
        return $this->belongsTo(BuildPhase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
