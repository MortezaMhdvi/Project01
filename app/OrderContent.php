<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'title', 'value'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
