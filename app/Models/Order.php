<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["user_id", "customer_email", "customer_address", "customer_phone", "total_price"];
    public function items()
    {

        return $this->hasMany(OrderItems::class);
    }
}
