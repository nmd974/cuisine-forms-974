<?php
    require_once(__ROOT__.'/src/controllers/doneeAtelier.php');
  if(isset($_POST["valider"])){
    $validation = validerDonneesAtelierForm($_POST);
    if(!$validation["valide"]){
        $message = '<div class="alert alert-danger">'.$validation["message"].'</div>';
        echo $message;
    }else{
        ajouterAtelier($_POST, $_FILES);
        header("Location:.\cuistoManager.php");
    }

  }
?>


    <div class="text-center mt-5 pt-5">
        <h2>
            AJOUTEZ VOS ATELIERS
        </h2>
    </div>
    <section class="container mt-5 pt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">Nom de l'atelier</label>
                <input type="text" class="form-control" id="titre" aria-describedby="#" name="titre" value='<?php if(isset($_POST["titre"])){ echo htmlentities($_POST["titre"]);}?>' >
                
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" maxlength="250"></textarea>
            </div>
           
            <div class="row">
                <div class="col d-flex flex-column ">
                    <div class=" row form-group col-lg-12 px-0 mb-0  ">
                        <div class="col-lg-6">
                            <label for="date_debut">Date début de l'atelier</label>
                            <input type="date" class="form-control" id="date_debut" placeholder="Another input placeholder" name="date_debut" >
                        </div>
                        <div class="col-lg-6 text-end mr-0 pr-0 ">
                            <label for="heure_debut"> Heure de début:</label>
                            <input type="time" id="heure_debut" name="heure_debut" class="form-control" placeholder="Another input placeholder" >
                        </div>
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre_places">Place disponibe</label>
                        <input type="number" class="form-control" id="nombre_places" placeholder="Example input placeholder" name="nombre_places" >
                    </div>
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="duree">Durée</label>
                        <input type="number" class="form-control" id="duree" placeholder="selection l'heure" name="duree" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="prix">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="prix" placeholder="selection coût" name="prix" >
                    </div>
                   
                </div>
                
            </div>
            
            <div class=" mt-3 mb-0">
                <label for="">Image</label>
            </div>
            <div class="input-group mb-3 ">
               
                <input type="file" for="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="image">
            </div>
            <div class="text-center">
                <button type="submit" name="valider" class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
       
    </section>

