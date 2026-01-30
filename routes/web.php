<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistiqueController;
use App\Models\Categorie;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);



Route::get('/a', [recetteController::class, 'aff']);

Route::get('/creationrecette', function(){
     $categories = Categorie::all(); 
      return view('creationrecette',compact('categories'));
});




Route::get('recettes/create', [RecetteController::class, 'create']);
Route::get('recettes/{recette}', [RecetteController::class, 'show']);
Route::post('recettes/store', [RecetteController::class, 'store'])->name('recettes.store');


Route::get('categories', [CategorieController::class, 'index']);
Route::get('categories/{categorie}', [CategorieController::class, 'show']);





Route::get('/dashboardhome', [DashboardController::class, 'index'])
    ->name('dashboardhome')
    ->middleware('auth');




Route::post('recettes/{recette}/commentaires',
    [CommentaireController::class, 'store']
)->middleware('auth')->name('commentaires.store');


Route::delete(
    'recettes/{recette}',
    [RecetteController::class, 'destroy']
)->middleware('auth')->name('recettes.destroy');


Route::get('recettes/{recette}/edit', [RecetteController::class, 'edit'])
    ->middleware('auth')
    ->name('recettes.edit');

Route::put('recettes/{recette}', [RecetteController::class, 'update'])
    ->middleware('auth')
    ->name('recettes.update');

Route::get('statistique',[StatistiqueController::class,'index']);

Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');
