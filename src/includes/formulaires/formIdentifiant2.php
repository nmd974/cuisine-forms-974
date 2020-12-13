  

    
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

                <!--Début identification-->
                
                <form method="POST"
                enctype="multipart/form-data" action="<?php htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES)?>" class="border mb-3 bg-light"> 

               

                    <div class="m-3">
                      <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required id="username" name="username" style="width: 93%;">
                      <div id="emailHelp" class="form-text">votre adresse email.</div>
                    </div>

                    <div  class="m-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="passord" required name="password" style="width: 93%;">
                    </div>
                    <div class="col-12 text-end my-3">
                        <button type="submit" class="btn btn-primary mr-5">Se conneter</button>
                    </div>
                    

                </form>
                <!--Fin identification-->

            </div>


            <div class="col-lg col-md-12 col-sm-12">

                <!--Titre section Inscription-->
                <div class="col-12">
                    <h6 class="text-center"> Pas encore membre ?</h6>
                    <h6 class="text-center"> Créez vite votre compte</h6>
                </div>

                <!--Début Formulaire inscription-->
                <form class="row border bg-light" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nomUser" value="" required  style="width: 91%;">
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" value="" required name="prenomUser" style="width: 91%;">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="emailUser" required style="width: 91%;">
                    </div>
                    <div class="col-md-12">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="number" class="form-control" value="" name="telUser" style="width: 91%;">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="passwordUser" required style="width: 91%;">
                    </div>

                    <!--button validation inscription-->
                    <div class="col-12 text-end my-3">
                        
                        <button type="submit" class="btn btn-primary mr-5" name="signUp" formmethod="post">M'inscrire</button>
                                
                    </div>

                    <!--appel controller SignUp positionner ici de manière à rester dans la colonne inscription-->
                     <?php include("../controllers/signUp.php"); ?>

                </form>
                <!--Fin Formulaire-->

            </div>
    
        </div>
    </section>
    
