<?php

namespace App;
use App\OrderDetail;
use App\InvoiceDetail;

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
}
