<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produit;
use App\Models\category;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function ajouterproduit ()
    {
        $produit = new produit ();
        $produit->designation = 'Maxwell';
        $produit->prix = 8000;
        $produit->description = "Maxwell c'est un super café";
        $produit->quantite = 50;
        $produit->save();
        dd($produit);
    }
    
    public function ajouterproduit2 ()
    {
        $produit = produit::create([
            "designation" => 'micro',
            "prix" => 500000,
            "description" => 'la description de ordinateur',
            "quantite" => 30,
        ]);
      dd($produit);
    }
    public function index ()
    {
        
        $produit1 = produit::first ();
        $user1 = User::first();
        
        $user1->produits()->attach($produit1);
        dd($user1->produits);
        
        $category1 = category::first();
        $produit1->category_id = $category1->id;
        $produit1->save();

        dd($produit1->category);
    }
    // modifier un produit premiere methode
    public function updateproduit()
    {
        $produit1 = produit::first();
        $produit1->designation = 'Avovita';
        $produit1->description = 'Pommade féminine à base avocat';
        $produit1->quantite = 10;
        $produit1->save(); 
        dd($produit1);
    }

    // modifier un produit deuxieme methode
    //public function updateproduit2 ($id)
    //{
       // $produit2 = produit::findorfail($id);
       // dd($produit2->designation);
    //}

    public function updateproduit2 (Produit $produit)
    {
        //dd($produit->designation);

        $result = Produit::where("id", $produit->id)->update([
            'designation' => 'Téléphone',
            'prix' => 50000,
            'description' => 'Ceci est la descriptionde téléphone',
            'quantite' => 26
        ]);
        dd($produit->designation, $result);
    }

    //suppression produit
    public function suppressionproduit ()
    {
        $result = Produit::destroy(1);
        dd($result);

    }
}
