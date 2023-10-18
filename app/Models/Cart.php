<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // Add 'user_id' to the fillable attributes
        'restaurant_id',
        'customer_id',
        'product_name',
        'unit_price',
        'quantity',
        'product_total',
    ];
}
