<?php

namespace App\Exports;

// use view;
use App\Models\produit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return produit::all();
    }
    public function view():View
    {
       return view('partials._produits-table', [
           'produits' => produit::all(),
       ]);
    }
}
