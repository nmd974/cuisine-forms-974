<?php 
    $title = "Ateliers de cuisine";
    $titlePage = "Liste des ateliers inscris";
    require_once(dirname(__DIR__)."/includes/header.php");
?>
    <?php require_once(__ROOT__.'/src/includes/particulier/ateliersInscris.php');?> 
    <?php require_once(__ROOT__.'/src/includes/footer.php');?>

