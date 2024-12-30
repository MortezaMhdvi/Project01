<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'title', 'code', 'value', 'date'
    ];

//    public function product(){
//        return $this->belongsToMany(OrderContent::class,'order_contents');
//    }
    public function order_content()
    {
        return $this->hasMany(OrderContent::class);
    }
}
