<!doctype html>
<html lang="fr">
  <head>
    <title>{{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    @show
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
  <body>
      <nav class="navbar navbar-expand-sm navbar-light bg-primary">
          <a class="navbar-brand" href="{{ route('acceuil') }}"><strong>OpenShop</strong></a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('acceuil') }}">Acceuil <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                  
              </ul>
              <ul class="navbar-nav mt-2 mt-lg-0">
                

            @guest
                
            <li class="nav-item active">
                    <a class="nav-link active" href="{{ route('register') }}">Inscription <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            @else 
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">

                    <a onClick="event.preventDefault(); document.getElementById('deconnexion').submit();"  class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
                    

                    <form id="deconnexion" method="post"action='{{ route('logout') }}'>

                        @csrf
                    </form>
                </div>
            </li> 
                
                @endguest
                 {{-- </li>
            //     <li class="nav-item">
            //       <a class="nav-link" href="#">Categories</a>
            //   </li> --}}
                 {{-- <li class="nav-item dropdown">
            //         <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventes</a>
            //         <div class="dropdown-menu" aria-labelledby="dropdownId">
            //             <a class="dropdown-item" href="#">Vente 1</a>
            //             <a class="dropdown-item" href="#">Vente 2</a>
            //         </div>
            //     </li> --}}
               {{-- </ul>
            //   <form class="form-inline my-2 my-lg-0">
            //       <input class="form-control mr-sm-2" type="text" placeholder="Recherche">
            //       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
            //   </form> --}}
            </li>
          </div>
      </nav>
      <main class="main-app mb-5">
          
              {{ $slot }}
          
      </main>

       <footer>
           <div class="container-fluid bg-dark pt-2 pb-2">
           <div class="text-center text-white">
             &copy; OpenShop 2021 | Tous droits réservés | Propulser par LARAVEL | Concepteur: victor OUEDRAOGO

           </div>


           </div>
       </footer>    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

  </body>
</html>