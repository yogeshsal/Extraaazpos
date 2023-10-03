<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifierGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'modifier_group_name',
        'modifier_group_type',
        'modifier_group_assoc_items_count',
        'modifier_group_modifiers',
        'modifier_group_short_name',
        'modifier_group_handle',
        'modifier_group_desc',
    ];
}
