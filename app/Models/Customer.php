<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'mobile', 'email', 'date_of_birth', 'address', 'tax_number', 'credit_limit', 'note',
    ];
}
