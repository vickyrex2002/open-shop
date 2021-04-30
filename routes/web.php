<?php

use App\Models\produit;
use App\Mail\AjpoutProduit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FormationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('index', [FormationController::class, 'index']);
Route::get('/', [MainController::class, 'acceuil']) ->name('acceuil');

Route::resource('produits', ProduitController::class);
Route::get("ajouter-produit", [FormationController::class, 'ajouterproduit']);
Route::get("ajouter-produit-2", [FormationController::class, 'ajouterproduit2']);
Route::get('update-produit', [FormationController::class, 'updateproduit']);
//Route::get('update-produit-2/{id}', [FormationController::class, 'updateproduit2']);
Route::get('update-produit-2/{produit}', [FormationController::class, 'updateproduit2']);
Route::get('suppression-produit', [FormationController::class, 'suppressionproduit']);
Route::get('test-mail', function(){
    $produit = produit::first();
   return new AjpoutProduit($produit);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('export', [ProduitController::class, 'export'])->name('export');
require __DIR__.'/auth.php';
