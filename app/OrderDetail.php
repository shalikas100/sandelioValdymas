<?php

namespace App;
use App\Order;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function orderDetailOrder()
    {
        return $this->belongsTo(Order::class, 'details_id', 'id');
    }

    public function orderDetailProducts()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
