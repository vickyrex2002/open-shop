<x-master-layout>
  <div class="container">
      <div class="row">
          <div class=col-md-12>
              <h1 class="text-center mt-2">Ajout d'un nouveau produit</h1>
          </div>
      </div>
      <div class="row">
         <div class="col-md-6 offset-md-3">
             <form method="post" action="{{ route('produits.store') }}" enctype="multipart/form-data">
                 @method("post")
                 @include("partials._produit-form")
   
             </form>
         </div>
     </div>
 
 
 
      </div>
  </div>
 
 
 
 
 
 </x-master-layout>