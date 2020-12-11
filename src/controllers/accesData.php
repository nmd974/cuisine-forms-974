<?php

    //Fonctions liés à la gestion des données en json
    function getUserData()
    {
        $data = json_decode(file_get_contents(__ROOT__.'/data/users.json'), true);
        if($data){
            return $data;
        }else{
            return null;
        }
    }

    function saveUserData($data_receive)
    {
        file_put_contents(__ROOT__.'/data/users.json', json_encode($data_receive));
        var_dump($data_receive);
        return 
        '<div class="col-12 d-flex justify-content-center">
        <div class="alert alert-success">L\'utilisateur a bien été modifié !</div>
        </div>';
    }

    function getAteliersData()
    {
        $data = json_decode(file_get_contents(__ROOT__.'/data/ateliers.json'), true);
        if($data){
            return $data;
        }else{
            return null;
        }
    }

    function saveAteliersData($data_receive)
    {
        file_put_contents(__ROOT__.'/data/ateliers.json', json_encode($data_receive));
        return 
        '<div class="col-12 d-flex justify-content-center">
        <div class="alert alert-success">L\'atelier a bien été modifié !</div>
        </div>';
    }


?>