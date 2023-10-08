<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modifieritem extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $casts = [
       'item_id' => 'array',
   ];
}
