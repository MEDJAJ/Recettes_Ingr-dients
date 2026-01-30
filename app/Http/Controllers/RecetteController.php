<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class RecetteController extends Controller
{
  
    public function create()
    {
        $categories = Categorie::all();
        return view('recettes.create', compact('categories'));
    }

  
   public function store(Request $request)
{
     
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'categorie_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'etapes' => 'required|array',
        'ingredients' => 'required|array',
    ]);
  
   
    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('recettes', 'public');
    }

  
    $recette = Recette::create([
        'title' => $request->title,
        'description' => $request->description,
        'categorie_id' => $request->categorie_id,
        'image' => $path,
        'user_id' => auth()->id(),
    ]);

   
    foreach ($request->etapes as $index => $etape) {
        $recette->etapes()->create([
            'numero_ordre' => $index + 1,
            'description' => $etape
        ]);
     
    }

   
    foreach ($request->ingredients as $ingredientData) {

      
        $ingredient = Ingredient::create([
            'nom' => $ingredientData
        ]);

       
        $recette->ingredients()->attach($ingredient->id);
    }

    return redirect()->route('dashboardhome');
}
   
   public function show(Recette $recette)
{
   
    $recette->load(['etapes', 'ingredients','commentaires']);
    return view('details', compact('recette'));
}

public function destroy(Recette $recette)
{
    
    if ($recette->image) {
        Storage::disk('public')->delete($recette->image);
    }

    
    $recette->delete();

    return redirect()->route('dashboardhome')
                     ->with('success', 'Recette supprimée avec succès');
}



public function edit(Recette $recette)
{
    
    if ($recette->user_id !== auth()->id()) {
        abort(403);
    }

    return view('edit', compact('recette'));
}


public function update(Request $request, Recette $recette)
{
    if ($recette->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only(['title', 'description']);

    if ($request->hasFile('image')) {

        if ($recette->image) {
            Storage::disk('public')->delete($recette->image);
        }

        $data['image'] = $request->file('image')->store('recettes', 'public');
    }

    $recette->update($data);

    return redirect()
        ->route('dashboardhome')
        ->with('success', 'Recette mise à jour avec succès ');
}





public function index(Request $request)
{
    $query = Recette::with('categorie');

  
    if ($request->filled('search')) {
        $query->where('title', 'LIKE', '%' . $request->search . '%');
    }

    
    if ($request->filled('category')) {
        $query->where('categorie_id', $request->category);
    }

    $recettes = $query->latest()->get();

    $categories = Categorie::all();
$user = auth()->user();
    return view('dashboardhome', compact('recettes', 'categories','user'));
}



}
