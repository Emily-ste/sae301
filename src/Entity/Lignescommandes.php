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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNb_place_resa(): ?int
    {
        return $this->commande_date;
    }

    public function setNb_place_resa(int $commande_date): self
    {
        $this->commande_date = $commande_date;

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
}