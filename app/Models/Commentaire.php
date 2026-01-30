<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'recette_id',
        'user_id',
    ];

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

