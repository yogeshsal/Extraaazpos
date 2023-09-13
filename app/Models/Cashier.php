<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Cashier extends Authenticatable
{
    use Notifiable;
    protected $guard = 'cashier';
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
