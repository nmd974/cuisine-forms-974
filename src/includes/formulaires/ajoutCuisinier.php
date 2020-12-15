<!-- <div class="text-center mt-5">
        <h1> Connexion au compte</h1>
</div> -->

<div class="card-deck m-auto">


<div class="card rounded" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="card-title">Nouveau chef cuisinier ?</h5>
      <h5 class="card-title">Créer son compte</h5>

       <!--appel controller SignUp positionner ici de manière à rester dans la colonne inscription-->
       <?php 
       //@ en php permets afficher message ereeur
       @$nom=$_POST["nomUser"];
       @$prenom=$_POST["prenomUser"];
       @$login=$_POST["emailUser"];
       @$pass=$_POST["passwordUser"];
       @$repass=$_POST["repass"];
       @$valider=$_POST["signUp"];
       $erreur="";
       if(isset($valider)){

          if(empty($nom)) $erreur="Nom laissé vide!";
          elseif(empty($prenom)) $erreur="Prénom laissé vide!";
          elseif(empty($prenom)) $erreur="Prénom laissé vide!";
          elseif(empty($login)) $erreur="Login laissé vide!";
          elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
          else{
            include("../controllers/signUpCuisinier.php"); 
          }
        }    
        ?>

       <!--Début Formulaire inscription-->
       <form class="row" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nomUser" value="">
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" value="" name="prenomUser">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="emailUser">
                    </div>
                    <div class="col-md-12">
                        <label for="specialite" class="form-label">Spécialité</label>
                        <input type="text" class="form-control" value="" name="specialite">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="passwordUser">
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Retaper Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="repass" >
                    </div>

                    <!--button validation inscription-->
                    <div class="col-12 text-end my-3">
                        
                        <button type="submit" class="btn btn-primary mr-5" name="signUp" formmethod="post">Ajouter</button>
                                
                    </div>

                </form>
                <!--Fin Formulaire-->
    </div>
  </div>

</div>