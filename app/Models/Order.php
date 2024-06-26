<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function orderDetails(): HasOne
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }
}
