<?php

class AccesBDD {

    public static function userData()
    {
        $data = json_decode(file_get_contents(__ROOT__.'/data/users.json'), true);
        if($data){
            return $data;
        }else{
            return null;
        }
    }
    public static function ateliersData()
    {
        $data = json_decode(file_get_contents(__ROOT__.'/data/ateliers.json'), true);
        if($data){
            return $data;
        }else{
            return null;
        }
    }
}

?>