<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'cat_short_name',
        'cat_handle',
        'cat_timing_group',
        'cat_desc',
        'cat_parent_category',
        'cat_kot_type',
        'cat_image',
        // Add other fields that you want to allow for mass assignment here
    ];
}
