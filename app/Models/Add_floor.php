<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_floor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'loc_id',
        'balcony', // Add the 'balcony' field here
        'table',
        // Add other fields as needed
    ];
}
