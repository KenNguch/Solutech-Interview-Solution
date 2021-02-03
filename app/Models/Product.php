<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable =
        [
            'name', 'description', 'quantity'

        ];

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }

    public function orderDetails()
    {
        return $this->hasOne(OrderDetail::class);
    }
}
