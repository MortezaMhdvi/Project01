<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    protected $fillable = [
        'order_id','product_id','title','value'
    ];
}
