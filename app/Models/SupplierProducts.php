<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProducts extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasMany(Products::class);
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }
}
