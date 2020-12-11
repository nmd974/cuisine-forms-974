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
});
</script>