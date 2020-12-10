<?php

class Ateliers {

    public $id;
    public $titre;
    public $description;
    public $date_debut;
    public $duree;
    public $date_ajout;
    public $place_disponible;
    public $place_max;
    public $prix;
    public $image;
    public $etat_ajout;

    public function __construct(int $id, string $titre, string $description, string $date_debut, int $duree, int $place_disponible, int $place_max, string $etat_ajout, string $date_ajout, int $prix, string $image)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_debut = $date_debut;
        $this->duree = $duree;
        $this->date_ajout = $date_ajout;
        $this->place_disponible = $place_disponible;
        $this->place_max = $place_max;
        $this->prix = $prix;
        $this->image = $image;
        $this->etat_ajout = $etat_ajout;
    }

    public function toHTML()
    {
        return <<<HTML
<div class="card my-3" style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="../../images/{$this->image}" class="card-img" alt="Nos cours de cuisine">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{$this->titre}</h5>
                  <p class="card-text">{$this->description}</p>
                  <p class="card-text">Commence : {$this->date_debut}</p>
                  <p class="card-text">Dure : {$this->duree} h</p>
                  <p class="card-text">{$this->place_disponible}/{$this->place_max} places disponibles</p>
                  <p class="card-text"><small class="text-muted">{$this->etat_ajout} {$this->date_ajout}</small></p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
        </div>
        <!--Fin exemple 1-->

        <!--séparation-->
        <div class="row separated">
            <hr class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
HTML;
    }
}
?>