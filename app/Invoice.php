<?php

namespace App;
use App\Manufacturer;
use App\InvoiceDetail;

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
