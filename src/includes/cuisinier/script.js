$(document).ready(function(){
    $('.custom-control').on('click', function() {
      window.location = window.location.pathname + '?id=' + this.id;
    })
    // console.log(window.location.search.slice(6));
    // if(window.location.search.substr(0,5) === "?idmo"){
    //   $(`#modal_${window.location.search.slice(6)}`).modal({
    //     show: true
    //   })
    // }
    // $('button[name="modifier"]').on('click', function(){
    //   // window.location = window.location.pathname + '?idmo=' + this.id.slice(7);
    //   // console.log(this.id);
    // })

    // $('#modifierAtelier').on('click', function(){
    //   $('.modal').modal({
    //     show: true
    //   })
    // })
});

