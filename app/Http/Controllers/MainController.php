<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produit;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function acceuil ()
    {
      //$users = User::all();
      // $users = User::orderByDesc('id')->first();
      // //dd($users);
      // $produits = produit::all();
      // $produitsFiltres = $produits->filter (function ($produit, $key)
      // {
      //   return $produit->prix > 100000 && $produit->prix < 500000;
      // });
      // dd($produitsFiltres);
      //dd($users->isAdmin());
      $produits = produit::OrderByDesc("id")->take(9)->get();
        //dd('BIENVENUE A LA FORMATION LARAVEL');
     return view('welcome', ['produits' => $produits]);
    }
}
