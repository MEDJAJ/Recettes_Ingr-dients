<?php
namespace App\Http\Controllers;
use App\Models\Recette;

class StatistiqueController extends Controller
{
    public function index()
    {

        $count = Recette::count();

       
        $topRecettes = Recette::withCount('commentaires')
            ->orderByDesc('commentaires_count')
            ->take(3)
            ->get();
           

        return view('statistique', compact('count', 'topRecettes'));
    }
}
