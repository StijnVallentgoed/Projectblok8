<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags'; // Adjust table name if necessary
    protected $primaryKey = 'tagid'; // Adjust primary key if necessary

    protected $fillable = [
        'titel', 'beschrijving', 'aanmaakdatum'
    ];

    public function nieuwsberichten()
    {
        return $this->belongsToMany(Nieuwsbericht::class, 'nieuwsberichtentag', 'tag_id', 'nieuwsbericht_id');
    }
}
