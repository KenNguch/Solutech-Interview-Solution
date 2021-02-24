<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landlord extends User
{
    use HasFactory;
    protected $table = "landlords";


    public function properties()
    {
        return $this->hasMany(Property::class);
    }


}

