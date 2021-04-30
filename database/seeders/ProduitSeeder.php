<?php

namespace Database\Seeders;

use App\Models\produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        produit::factory(500)->create();
       // produit::create ([
           // "designation" =>"chemise",
           // "prix" => 5000,
           // "description" => "ceci est la description de chemise",
           // "quantite" => 50,
        //]);
    }
}
