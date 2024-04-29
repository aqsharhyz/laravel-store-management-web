<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";
    protected $timestamps = true;

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'order_id', 'id');
    }
}
