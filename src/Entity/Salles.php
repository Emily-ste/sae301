<?php

namespace App\Entity;

use App\Repository\SallesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SallesRepository::class)]
class Salles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $salle_nom = null;

    #[ORM\Column]
    private ?int $salle_capacite = null;

    #[ORM\Column(length: 120)]
    private ?string $salle_adresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalleNom(): ?string
    {
        return $this->salle_nom;
    }

    public function setSalleNom(string $salle_nom): self
    {
        $this->salle_nom = $salle_nom;

        return $this;
    }

    public function getSalleCapacite(): ?int
    {
        return $this->salle_capacite;
    }

    public function setSalleCapacite(int $salle_capacite): self
    {
        $this->salle_capacite = $salle_capacite;

        return $this;
    }

    public function getSalleAdresse(): ?string
    {
        return $this->salle_adresse;
    }

    public function setSalleAdresse(string $salle_adresse): self
    {
        $this->salle_adresse = $salle_adresse;

        return $this;
    }
}
