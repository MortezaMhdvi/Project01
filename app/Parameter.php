<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = [
        'title'
    ];

    public function parameterOption()
    {
        return $this->hasMany(ParameterOptions::class);
    }

    public function buildPhase()
    {
        return $this->belongsToMany(BuildPhase::class,'build_phase_or_parameter');
    }

}
