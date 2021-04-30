<?php
if(!function_exists('nb_produit')){
    function nb_produit($nb)
    {
      if($nb>1)
      return $nb. "produits";
      else
      return $nb. "produit";
    }
}
if(!function_exists('mil_prix')){
    function mil_prix($prix)
    {
        if($prix>1000)
        return number_format($prix). "CFA";
        else 
        return $prix. "CFA";
    }
}