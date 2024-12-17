<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','is_production','start_time','end_time'
    ];
}
