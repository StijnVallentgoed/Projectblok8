<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nieuwsbericht extends Model
{
    protected $table = 'nieuwsbericht';
    protected $primaryKey = 'nieuwsid';

    protected $fillable = [
        'titel', 'beschrijving', 'categorie_id', 'user_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'categorieid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userid');
    }

    public function commentaar()
    {
        return $this->hasMany(Commentaar::class, 'nieuwsbericht_id', 'nieuwsid');
    }

    public function tags()
{
    return $this->belongsToMany(Tag::class, 'nieuwsberichtentag', 'nieuwsbericht_id', 'tag_id');
}

}
