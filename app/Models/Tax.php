<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'taxes';
    use HasFactory;
    protected $fillable = [
        'tax_type',
        'tax_code',
        'name',
        'description',
        'applicable_on',
        'tax_percentage',
        'applicable_modes',       
    ];
}
