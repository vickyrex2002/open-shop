
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
                <a onclick="event.preventDefault(); if(confirm('êtes vous sûr de vouloir supprimer ce produit ? ')) document.getElementById('{{ $produit->id }}').submit();" class="btn btn-danger btn-sm" href="{{ route ('produits.destroy', $produit) }}"><i class="fas fa-trash"></i></a>
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