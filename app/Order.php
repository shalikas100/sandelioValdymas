<?php

namespace App;
use App\Client;
use App\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderClients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function orderOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'details_id', 'id');
    }

}