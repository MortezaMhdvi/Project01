<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterOptions extends Model
{
    protected $fillable = [
        'parameter_id', 'title'
    ];

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
