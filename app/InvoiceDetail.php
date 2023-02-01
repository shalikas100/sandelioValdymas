<?php

namespace App;
use App\Invoice;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    public function InvoiceDetailInvoice()
    {
        return $this->belongsTo(Invoice::class, 'inv_details_id', 'id');
    }

    public function invoiceDetailProducts()
    {
        return $this->belongsTo(Product::class, 'inv_product_id', 'id');
    }
}
