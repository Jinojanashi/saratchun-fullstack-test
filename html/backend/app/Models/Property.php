<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'for_sale', 'for_rent', 'sold', 'price', 
        'currency', 'currency_symbol', 'property_type', 'bedrooms', 'bathrooms', 
        'area', 'area_type', 'country', 'province', 'street', 'photos'
    ];

    protected $casts = [
        'for_sale' => 'boolean',
        'for_rent' => 'boolean',
        'sold' => 'boolean',
        'photos' => 'array',
    ];
}
