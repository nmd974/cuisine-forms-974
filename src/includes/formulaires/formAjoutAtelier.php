<?php var_dump($_POST);?>

    <div class="text-center mt-5 pt-5">
        <h2>
            AJOUTEZ VOS ATELIERS
        </h2>
    </div>
    <section class="container mt-5 pt-5">
        <form action="authentification.php" method="post" >
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'atelier</label>
                <input type="text" class="form-control" id="#" aria-describedby="#" name="titreAtelier">
                
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
           
            <div class="row">
                <div class="col d-flex flex-column ">
                    <div class="form-group col-lg-12 px-0 mb-0 ">
                        <label for="formGroupExampleInput2">Date de l'atelier</label>
                        <input type="datetime-local" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="dateAtelier" >
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="formGroupExampleInput">Place disponibe</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="placeDisponible" >
                    </div>
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Heur d'ouverture</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection l'heure" name="time" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="formGroupExampleInput">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection coût" name="prixAtelier" >
                    </div>
                   
                </div>
                
            </div>
            
            <div class=" mt-3 mb-0">
                <label for="">Image</label>
            </div>
            <div class="input-group mb-3 ">
               
                <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
        
    </section>

