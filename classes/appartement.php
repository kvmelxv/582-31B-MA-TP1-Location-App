<?php

class Appartement {

    private $description;
    private $adresse;
    private $nombreChambre;
    private $nombreSalleDeBain;
    private $surface;
    private $prix;

    //** Consructor */
    public function __construct($description, $adresse, $nombreChambre, $nombreSalleDeBain, $surface, $prix) {
        $this->description = $description;
        $this->adresse = $adresse;
        $this->nombreChambre = $nombreChambre;
        $this->nombreSalleDeBain = $nombreSalleDeBain;
        $this->surface = $surface;  
        $this->prix = $prix;
    }

    //** Methodes - set*/
    public function setName($adresse){
        $this->adresse = $adresse;
    }




}

?>