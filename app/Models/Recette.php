<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

   protected $fillable = [
    'title',
    'description',
    'categorie_id',
    'image',
    'user_id',
];


    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

 public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function etapes()
    {
        return $this->hasMany(EtapePrepare::class)
                    ->orderBy('numero_ordre');
    }

    public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

}
