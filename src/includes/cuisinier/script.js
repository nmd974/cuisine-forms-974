$(document).ready(function(){
    $('.custom-control').on('click', function() {
      console.log(this.id);
      window.location = window.location.pathname + '?id=' + this.id;
    })

});
function modifUrl(){
  window.location = window.location.pathname + '?1';
};
