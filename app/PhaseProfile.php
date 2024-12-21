<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhaseProfile extends Model
{
    protected $fillable = [
        'title'
    ];

    public function buildPhase()
    {
        return $this->belongsToMany(BuildPhase::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
