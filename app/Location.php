<?php

namespace App;

use App\Product;
use App\Order;
use App\OrderDetail;
use App\Invoice;
use App\InvoiceDetail;
use App\Manufacturer;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function locationProduct()
    {
        return $this->hasMany(Product::class, 'vieta_sandelyje', 'id');
    }
}
