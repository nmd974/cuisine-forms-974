<script>
$(document).ready(function(){
    $('.accordion').on('click', 'input', function() {
        console.log($('#labelswitch').text());
        if($('#labelswitch').text() === "Désactivé"){
            $('#labelswitch').text("Activé");
            console.log(window.location);
            // window.location = window.location.pathname + '?action=activer&id=' + this.id;
        }else{
            $('#labelswitch').text("Désactivé");
            // window.location = window.location.pathname + '?action=desactiver&id=' + this.id;
        }
    })
<<<<<<< HEAD
    console.log(window.location.search.slice(6));
    if(window.location.search.substr(0,5) === "?idmo"){
      $(`#modal_${window.location.search.slice(6)}`).modal({
        show: true
      })
    }
    $('button[name="modifier"]').on('click', function(){
      // window.location = window.location.pathname + '?idmo=' + this.id.slice(7);
      console.log(this.id);
    })

    // $('#modifierAtelier').on('click', function(){
    //   $('.modal').modal({
    //     show: true
    //   })
    // })
=======
>>>>>>> parent of 9e2d4be...  branch
});
</script>