$(document).ready(function(){
    $('.custom-control').on('click', function() {
      window.location = window.location.pathname + '?id=' + this.id;
    })
    console.log(window.location.search.substr(0,5));
    if(window.location.search.substr(0,5) === "?idmo"){
      $(`#modal_${window.location.search}`).modal({
        show: true
      })
    }
    // $('#modifierAtelier').on('click', function(){
    //   $('.modal').modal({
    //     show: true
    //   })
    // })
});

