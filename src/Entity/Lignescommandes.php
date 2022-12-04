<?php

namespace App\Entity;

use App\Repository\LignescommandesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignescommandesRepository::class)]
class Lignescommandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_place_resa = null;

    #[ORM\ManyToOne(inversedBy: 'lignescommandes')]
    private ?Manifestations $manifestation = null;

    #[ORM\ManyToOne(inversedBy: 'ligne_commande')]
    private ?Commandes $commandes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlaceResa(): ?int
    {
        return $this->nb_place_resa;
    }

    public function setNbPlaceResa(int $nb_place_resa): self
    {
        $this->nb_place_resa = $nb_place_resa;

        return $this;
    }

    public function getManifestation(): ?Manifestations
    {
        return $this->manifestation;
    }

    public function setManifestation(?Manifestations $manifestation): self
    {
        $this->manifestation = $manifestation;

        return $this;
    }

    public function getCommandes(): ?Commandes
    {
        return $this->commandes;
    }

    public function setCommandes(?Commandes $commandes): self
    {
        $this->commandes = $commandes;

        return $this;
    }
}