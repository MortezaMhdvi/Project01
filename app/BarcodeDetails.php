<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarcodeDetails extends Model
{
    protected $fillable = [
        'value','type'
    ];
    public function barcode(){
        return $this->belongsToMany(Barcode::class);
    }
}
