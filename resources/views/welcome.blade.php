<x-master-layout>
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-0.3.5&s=c3d0603820b595592d80f5a239938c67&auto=format&fit=crop&w=1500&q=80);">
  
        <div class="container-fluid">
           <div class="row  justify-content-center align-items-center d-flex text-center h-100">
             <div class="col-12 col-md-8  h-50 ">
                 <h1 class="display-2  text-light mb-2 mt-5"><strong>BIENVENUE SUR OPEN SHOP</strong> </h1>
                 <p class="lead  text-light mb-5">La boutique qui vous fournis tous les besoins en temps réel et au meilleur prix</p>
     <p><a href="https://blueprintsapp.launchaco.com/" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">Accéder à vos ventes en ligne ></a></p>
                         
                           
             </div>
              
           </div>
         </div>
         </section>
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                  <hr>
                  <h1>les derniers arrivages</h1>
                  <hr>
                 </div>
             </div>
             <div class="row">
                
                    @foreach ($produits as $produit)
                        
                    <div class="col-md-4">

                      <div class="card text-center mb-4">
                        <img class="card-img-top" src="{{ ($produit->image=="produit.png" OR $produit->image==null) ? 'https://picsum.photos/id/237/200' : asset('storage/produits/'.$produit->image) }} " alt="">
                        <div class="card-body">
                          <h4 class="card-title">{{ $produit->designation }}</h4>
                          <p class="card-text">{{ $produit->description }}</p>
                          <div class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('produits.show', $produit) }}"> <i class="fas fa-shopping-cart"></i>Commander</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    @endforeach
            </div>
         </div>
</x-master-layout>
