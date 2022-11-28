<?php

namespace App\Entity;

class Recherche{
    protected $recherche;

    public function getRecherche(): string{
        return $this->recherche;
    }

    public function setRecherche(string $recherche): void{
        $this->recherche = $recherche;
    }
}