<?php

namespace App;

use App\Order;
use App\OrderDetail;
use App\InvoiceDetail;
use App\Manufacturer;
use App\Product;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoiceManufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }

    public function invoiceInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, 'inv_details_id', 'id');
    }
}
