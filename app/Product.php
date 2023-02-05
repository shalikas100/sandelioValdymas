<?php

namespace App;

use App\Order;
use App\OrderDetail;
use App\Invoice;
use App\InvoiceDetail;
use App\Manufacturer;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function productInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, 'inv_product_id', 'id');
    }

    public function productManufacturers()
    {
        return $this->belongsTo(Manufacturer::class, 'gamintojas', 'id');
    }
}
