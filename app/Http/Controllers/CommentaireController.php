<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Recette;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request, Recette $recette)
    {
     
        $request->validate([
            'contenu' => 'required|string',
        ]);

        
        Commentaire::create([
            'contenu' => $request->contenu,
            'recette_id' => $recette->id,
            'user_id' => auth()->id(),
        ]);

       
        return back();
    }
}


