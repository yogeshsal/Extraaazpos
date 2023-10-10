<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modifiergroupitem extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $casts = [
       'modifiergroup_id' => 'array',
   ];
}
