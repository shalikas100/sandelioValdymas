<?php

namespace App;
use App\Invoice;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function manufacturerInvoice()
    {
        return $this->hasMany(Invoice::class, 'manufacturer_id', 'id');
    }
}
