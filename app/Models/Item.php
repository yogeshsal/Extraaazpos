<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_name',
        'handle',
        'category',
        'pos_code',
        'food_type',
        'sort_order',
        'is_recommended',
        'is_packaged_good',
        'sell_by_weight',
        'default_sales_price',
        'markup_price',
        'aggregator_price',
        'external_id',
        'description',
    ];
}
