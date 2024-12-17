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

}
