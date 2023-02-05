<?php

namespace App;

use App\Invoice;
use App\Order;
use App\OrderDetail;
use App\InvoiceDetail;
use App\Product;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function manufacturerInvoice()
    {
        return $this->hasMany(Invoice::class, 'manufacturer_id', 'id');
    }

    public function manufacturerProduct()
    {
        return $this->hasMany(Product::class, 'gamintojas', 'id');
    }
    
}
