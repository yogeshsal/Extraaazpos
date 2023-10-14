<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{   
    protected $fillable = [
        'name',
        'type',
        'handle',
        'tax_number',
        'city',
        'state',
        'fssai_id',
        'address',
        'stock_location',
        'brand',
        'max_slot_number',
        'last_publish',
    ];
    use HasFactory;
}
