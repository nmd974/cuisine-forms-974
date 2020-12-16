
<div class="card-deck m-auto">

  <div class="card rounded"style="max-width: 6000px;">
    <div class="card-body">
      <h5 class="card-title">Déjà membre?</h5>
      <h5 class="card-title">Se connecter</h5>

      <?php 
        
        require_once(__ROOT__.'/src/controllers/authentification.php');
        if(isset($_POST['connecter'])){
            $messageValidation = validationConnexion();
        }

      ?>
      
      
      <!--Début identification-->  
      <?php 
      //Message retourné en cas d'erreur
        if(isset($messageValidation[2])){
            echo $messageValidation[2];
        }
      ?>
      <form method="POST" enctype="multipart/form-data" class="mt-5"> 

          <div>
              <label for="email" class="form-label">Identifiant</label>
              <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Votre adresse email" name="email">
          </div>
          <div>
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Votre adresse mot de passe"  name="password">
          </div>
          <div class="col-12 text-end mt-5">
              <button type="submit" class="btn btn-primary mr-4" name="connecter">Se connecter</button>
          </div>
           
                    
      </form>
      <!--Fin identification-->


    </div>
</div>

<div class="card rounded" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="card-title">Pas encore membre ?</h5>
      <h5 class="card-title">Créer vite votre compte</h5>

       <!--Vérifie si un champs en vide avant lancer la vérifications des valeurs-->
       <?php 
       
       @$nom=$_POST["nomUser"];
       @$prenom=$_POST["prenomUser"];
       @$login=$_POST["emailUser"];
       @$pass=$_POST["passwordUser"];
       @$repass=$_POST["repass"];
       @$valider=$_POST["signUp"];
       @$erreur="";
       if(isset($valider)){

          if(empty($nom)) $erreur='<div class="alert alert-danger">Nom laissé vide!</div>';
          elseif(empty($prenom)) $erreur='<div class="alert alert-danger">Prenom laissé vide!</div>';
          elseif(empty($login)) $erreur='<div class="alert alert-danger">Email laissé vide!</div>';
          elseif(empty($pass)) $erreur='<div class="alert alert-danger">Mot de passe laissé vide!</div>';
          elseif(empty($repass)) $erreur='<div class="alert alert-danger">Veuillez confirmer le mot de passe saisie!</div>';
          else{
            include("../controllers/signUp.php"); 
          }
        }    
        ?>

       <!--Début Formulaire inscription-->
       <?php
            if(isset($erreur)){
                echo $erreur;
            }
       ?>
       <form class="row mt-5" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom*</label>
                        <input type="text" class="form-control" name="nomUser" id="name" 
                        value="<?php if(isset($_POST['nomUser'])){
                            echo $_POST['nomUser'];
                        }?>">
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms*</label>
                        <input type="text" class="form-control" name="prenomUser" id="prenom" 
                        value="<?php if(isset($_POST['prenomUser'])){
                            echo $_POST['prenomUser'];
                        }?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="inputEmail4" name="emailUser" 
                        value="<?php if(isset($_POST['emailUser'])){
                            echo $_POST['emailUser'];
                        }?>">
                    </div>
                    <div class="col-md-12">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="number" class="form-control" name="telUser" id="telephone" 
                        value="<?php if(isset($_POST['telUser'])){
                            echo $_POST['telUser'];
                        }?>">
                    </div>
                    <div class="col-md-12">
                        <label for="confirmPassword" class="form-label">Mot de passe*</label>
                        <input type="password" class="form-control" id="confirmPassword" name="passwordUser">
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Retaper Mot de passe*</label>
                        <input type="password" class="form-control" id="inputPassword4" name="repass">
                    </div>
                    <div class="col-md-12 mt-5">
                        *Champs obligatoires
                    </div>
                    <!--button validation inscription-->
                    <div class="col-12 text-end mt-5">
                        
                        <button type="submit" class="btn btn-primary mr-5" name="signUp" formmethod="post">M'inscrire</button>
                                
                    </div>

                </form>
                <!--Fin Formulaire-->
    </div>
  </div>

</div>