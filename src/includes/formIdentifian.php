<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="text-center mt-5 pt-5">
        <h1> Connexion au compte</h1>
    </div>
    <section class="container mt-5 pt-5">
        <div class="row d-flex">
            <div class=" col-lg col-md-12 col-sm-12">
                <div class="col-12">
                    <h6 class="text-center"> Déjà membre?</h6>
                    <h6 class="text-center"> Se conneter</h6>
                </div>
                <form> 
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Pseudo ou votre adresse email.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                 </form>
            </div>
            <div class="col-lg col-md-12 col-sm-12">
                <div class="col-12">
                    <h6 class="text-center"> Pas encore membre ?</h6>
                    <h6 class="text-center"> Créez vite votre compte</h6>
                </div>
                <form class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="#" value="" required>
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" id="#" value="" required>
                    </div>
                    <div class="col-md-12">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-12">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="number" class="form-control" id="#" value="" required>
                    </div>
                    <div class="col-md-12">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" class="form-control" id="inputPassword4">
                    </div>
           <div class="col-12 text-end">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </form>
            </div>
    
        </div>
    </section>
    
    
</body>
</html>