<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'order_number',
    ];
    protected $table = "orders";

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
