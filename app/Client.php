<?php

namespace App;
use App\Order;
use App\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function clientOrders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
