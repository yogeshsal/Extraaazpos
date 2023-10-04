<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [        
            'item_name',
            'item_associated_location',
            'item_description',
            'item_category_id',
            'item_sell_price',
            'item_short_name',
            'item_food_type',
            'item_pos_code',
            'item_is_recommended',
            'item_is_package_good',
            'item_sell_by_weight',
            'item_image',
            'item_tax_type_id',
            'item_charge_id',
            'item_default_sell_price',
            'item_markup_price',
            'item_aggregator_price',
            'item_external_id',
            'item_modifier_id',
            'item_advance_order',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    }
}
