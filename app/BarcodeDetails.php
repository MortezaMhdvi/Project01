<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarcodeDetails extends Model
{
    protected $fillable = [
        'value','type'
    ];
}
