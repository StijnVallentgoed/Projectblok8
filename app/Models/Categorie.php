<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie'; // Ensure this matches your actual table name in the database
    protected $primaryKey = 'categorieid'; //

    protected $fillable = [
        'titel', 'beschrijving', 'aanmaakdatum'
    ];

    public function nieuwsberichten()
    {
        return $this->hasMany(Nieuwsbericht::class, 'categorie_id', 'categorieid');
    }
}



