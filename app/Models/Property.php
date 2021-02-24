<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const AVAILABLE_PROPERTY = 'available';
    const UNAVAILABLE_PROPERTY = 'unavailable';

    protected $table = "properties";

    protected $fillable =
        [
            'name',
            'address',
            'status',
            'price',
            'number_of_bedrooms',
            'number_of_bathrooms',
            'description',
            'square_feet',
            'dimensions',
            'house_type',
            'landlord_id',
            'images',
        ];

    public function isAvailable()
    {
        return $this->status == Property::AVAILABLE_PROPERTY;
    }

    public function isUnavailableAvailable()
    {
        return $this->status == Property::UNAVAILABLE_PROPERTY;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function rent()
    {
        return $this->hasMany(Rent::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }
}
