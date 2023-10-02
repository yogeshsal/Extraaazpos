<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTiming extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'handle',
        'description',
        'start_time',
        'end_time',
        'days', // Add 'days' to the fillable array
        'user_id',
    ];
}
