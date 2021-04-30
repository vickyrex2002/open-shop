<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       category::create([
           'libelle' =>'Vetement',
           'description' => 'ceci est la description de vetement'
       ]);

       category::create([
        'libelle' =>'cosmetique',
        'description' => 'ceci est la description de cosmetique'
    ]);

    }
}
