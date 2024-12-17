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
        return $this->belongsToMany(PhaseProfile::class,'rel_build_phase_profile','build_phase_id', 'phase_profile_id');
    }
}
