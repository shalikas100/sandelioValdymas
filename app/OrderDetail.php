<?php

namespace App;

use App\Order;
use App\Product;
use App\Invoice;
use App\InvoiceDetail;
use App\Manufacturer;
use App\Client;
use App\Location;

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
