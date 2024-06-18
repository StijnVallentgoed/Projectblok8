<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaar extends Model
{
    protected $table = 'commentaar';
    protected $primaryKey = 'commentaarid';

    protected $fillable = [
        'bericht', 'aanmaakdatum', 'usersid', 'nieuwsbericht_id'
    ];

    // Relationships if defined
    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'userid');
    }

    public function nieuwsbericht()
    {
        return $this->belongsTo(Nieuwsbericht::class, 'nieuwsbericht_id', 'nieuwsid');
    }
}
