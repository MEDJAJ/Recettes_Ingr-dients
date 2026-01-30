<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtapePrepare extends Model
{
    protected $fillable = [
        'numero_ordre',
        'description',
        'recette_id'
    ];

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }
}

