<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;


class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Categorie::create($request->all());
        return redirect()->route('categories.index');
    }
}

