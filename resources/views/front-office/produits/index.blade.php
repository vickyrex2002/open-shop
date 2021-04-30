<x-master-layout>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-2">Tous nos produits</h1>
            <h6 class="text-center">Notre catalogue comporte {{ nb_produit(2) }}</h6>
            <hr>
        </div>
    </div>
    <div class="row">
        @if(session('statut'))
               <div class="col-md-12">

                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                      <strong>{{ session("statut") }}</strong> 
                  </div>
                </div>
            @endif
        @if (Auth::user()!=null && Auth::user()->isAdmin())

        <div class="col-md-12">
          <div class="text-center">
             <a class="btn btn-primary btn sm" href='{{ route('produits.create') }}'><i class="fas fa-plus"></i>AJOUTER NOUVEAU PRODUIT</a>
          </div> 
        @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Prix</th>
                        <th>quantité</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $produits as $produit )
                    <tr>
                        <td scope="row">{{ $produit->designation }}</td>
                        <td>{{ mil_prix($produit->prix) }}</td>
                        {{-- <td>{{ $produit->prix }}</td> --}}
                        <td>{{ $produit->quantite }}</td>
                        <td>{{ $produit->description }}</td>
                        <td class="d-flex">

                            <a class="btn btn-info btn-sm mr-2" href="{{ route ('produits.show', $produit) }}"><i class="fas fa-eye"></i></a>
                            @if (Auth::user()!=null && Auth::user()->isAdmin())
                            <a class="btn btn-primary btn-sm mr-2" href="{{ route ('produits.edit', $produit) }}"><i class="fas fa-edit"></i></a> 
                            <a onclick="event.preventDefault(); delConfirm('{{ $produit->id }}')" class="btn btn-danger btn-sm" href="{{ route ('produits.destroy', $produit) }}"><i class="fas fa-trash"></i></a>
                            @endif
                            <form style="display: none" id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy', $produit) }}">
                                @csrf
                                @method("DELETE")
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>

            </table>
            <div class="row d-flex justify-content-center mt-5">
                <div class="">
                    {{ $produits->links() }}
                </div>

            </div>
        </div>
    </div>

</div>

</x-master-layout>