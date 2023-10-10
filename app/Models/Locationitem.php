<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locationitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    
     protected $casts = [
        'location_id' => 'array',
    ];
}
