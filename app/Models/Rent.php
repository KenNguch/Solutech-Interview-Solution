<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = "rents";

    protected $fillable =
        [
            'period',
            'tenant_id',
            'property_id',
        ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }


}
