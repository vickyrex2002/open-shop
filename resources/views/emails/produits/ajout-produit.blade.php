@component('mail::message')
# Du nouveau sur Open Shop

## un nouveau super produit vient d'être ajouté sur votre superbe palteforme Open Shop

vous trouverez ci-dessous les informations sur le nouveau produit.
### Désignation: {{ $produit->designation }}
## Prix: {{ $produit->prix }}
## Categorie: {{ $produit->category->libelle}}

Pour commander ce produit cliquez juste sur le boutton ci-dessous.


@component('mail::button', ['url' => route('produits.show', $produit)])
Commander ce produit
@endcomponent

Merci d'avoir choisi Open Shop pour votre shopping,<br><br>
{{ config('app.name') }}
@endcomponent
