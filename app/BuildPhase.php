<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildPhase extends Model
{
    protected $fillable = [
        'title', 'order'
    ];

    public function phaseProfile()
    {
        return $this->belongsToMany(PhaseProfile::class);
    }

    public function parameter()
    {
        return $this->belongsToMany(Parameter::class, 'build_phase_or_parameter');
    }

    public function label()
    {
        return $this->hasmany(Label::class);
    }

    public function product_details()
    {
        return $this->hasMany(ProductDetails::class);
    }
}
