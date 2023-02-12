<?php

namespace App;

use App\Order;
use App\OrderDetail;
use App\Invoice;
use App\InvoiceDetail;
use App\Manufacturer;
use App\Product;
use App\Location;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function clientOrders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
