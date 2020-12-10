<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Atelier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="text-center mt-5">
        <h2>
            AJOUTEZ VOS ATELIERS
        </h2>
    </div>
    <section class="container mt-5 pt-5">
        <form action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'atelier</label>
                <input type="text" class="form-control" id="#" aria-describedby="#">
                
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
           
            <div class="row">
                <div class="col d-flex flex-column ">
                    <div class="form-group col-lg ">
                        <label for="formGroupExampleInput2">Date de l'atelier</label>
                        <input type="datetime-local" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="duree" >
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="formGroupExampleInput">Place disponibe</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="prix" >
                    </div>
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Heur d'ouverture</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection l'heure" name="prix" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="formGroupExampleInput">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection coût" name="prix" >
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
                <button type="button" class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
        
    </section>
</body>
</html>