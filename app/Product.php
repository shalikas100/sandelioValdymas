<?php

namespace App;
use App\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productOrderDetails()
    {
    return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
}
