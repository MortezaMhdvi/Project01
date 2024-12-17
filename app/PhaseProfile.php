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
        return $this->belongsToMany(BuildPhase::class, 'rel_build_phase_profile','phase_profile_id', 'build_phase_id');
    }
}
