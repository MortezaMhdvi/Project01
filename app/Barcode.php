<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $fillable= [
        'title','prefix','type'
    ];
    public function barcode_details(){
        return $this->belongsToMany(BarcodeDetails::class)->withPivot('order');
    }
    public function labels(){
        return $this->hasmany(Label::class);
    }
}
