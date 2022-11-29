<?php

namespace App\Entity;

use App\Repository\SallesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'salles', targetEntity: manifestations::class)]
    private Collection $salle;

    public function __construct()
    {
        $this->salle = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, manifestations>
     */
    public function getSalle(): Collection
    {
        return $this->salle;
    }

    public function addSalle(manifestations $salle): self
    {
        if (!$this->salle->contains($salle)) {
            $this->salle->add($salle);
            $salle->setSalles($this);
        }

        return $this;
    }

    public function removeSalle(manifestations $salle): self
    {
        if ($this->salle->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getSalles() === $this) {
                $salle->setSalles(null);
            }
        }

        return $this;
    }
}
