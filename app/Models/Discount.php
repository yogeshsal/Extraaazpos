<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_name',
        'applicable_on',
        'discount_type',
        'discount_value',
        'desc',
        'max_discount_value',
        'min_total_amount',
        'auto_apply_billing_type',
        'user_role',
        'restaurant_id',
    ];
}