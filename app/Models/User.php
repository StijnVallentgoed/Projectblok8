<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'userid';

    protected $fillable = [
        'voornaam', 'tussenvoegsel', 'achternaam', 'email','password', 'Huisnummer', 'Straatnaam', 'Postcode', 'plaatsnaam', 'Land',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define relationships or additional methods as needed
}

