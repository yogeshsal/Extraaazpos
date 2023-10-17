<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discountitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
       'item_id' => 'array',
   ];
}
