<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produit;
use App\Models\category;
use App\Mail\AjpoutProduit;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\NouveauProduit;
use App\Http\Requests\ProduitFormRequest;

class ProduitController extends Controller
{
    //permet d'appliquer le middleware à la produit controller à l'exception d'index et show
    public function __construct() 
    {
        $this->middleware(['auth','isAdmin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = produit::OrderByDesc('id')->paginate(15);
        return view("front-office/produits/index", ['produits' => $produit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = category::all();
        $produit = new produit();
        return view('front-office.produits.create', compact('categories', 'produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
       //     dd($request);
  {   
           //dd($request->file('image')->getClientOriginalName());
           $imageName='produit.png';
           if($request->file('image')){
               $imageName=time().'_'.$request->file('image')->getClientOriginalName();
               $request->file('image')->storeAs('public/produits', $imageName);
           }  

        //dd($request->all());

        $produit = produit::create([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->categorie,
            'quantite' => $request->quantite,
            'description' =>$request->description,
            'image' => $imageName,
        ]);
        $user = User::first();
        Mail::to($user)->send(new AjpoutProduit($produit));
        return redirect()->route('produits.show', $produit)->with("statut", "Votre nouveau produit a été bien ajouté !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(produit $produit)
    {
        return view('front-office.produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(produit $produit)
    { 
        $categories  = category::all();
        return view('front-office.produits.edit', ['produit'=> $produit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        $imageName='produit.png';
           if($request->file('image')){
               $imageName=time().'_'.$request->file('image')->getClientOriginalName();
               $request->file('image')->storeAs('public/produits', $imageName);
           } 
        
        produit::where('id', $id)->update([
            
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'category_id' => $request->categorie,
            'designation' => $request->designation,
            'image' => $imageName,
        ]);
        $user = User::first();
        $produit = Produit::first();
    
        $user->notify(new NouveauProduit($produit));
        return redirect()->route('produits.index')->with("statut",'votre produit a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produit::destroy($id);
        return redirect()->route('produits.index')->with("statut",'votre produit a bien été supprimé');
    }
    public function export()
    {
        return Excel::download(new ProduitsExport, "produits.xlsx");
    }
}
