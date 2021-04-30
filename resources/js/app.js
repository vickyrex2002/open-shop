require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";
window.delConfirm = function(formId){
  
Swal.fire({
    title: 'ête vous sur de vouloir supprimer ce produit ?',
    text: "si vous supprimee ce produit, vous ne serez plus en mesure de le récupérer!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, supprimer!',
    cancelButtonText: "Annuler"
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(formId).submit()
    }
  })
}