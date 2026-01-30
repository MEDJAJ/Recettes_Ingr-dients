<?php

namespace App\Http\Controllers;
use App\Models\Recette;

class DashboardController extends Controller
{
    public function index()
    {
        $recettes = Recette::with('categorie')->get();
          $user = auth()->user(); 
        return view('dashboardhome', compact('recettes','user'));
    }
}

