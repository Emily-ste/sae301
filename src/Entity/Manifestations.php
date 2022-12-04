<?php

namespace App\Entity;

use App\Repository\ManifestationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManifestationsRepository::class)]
class Manifestations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $manif_titre = null;

    #[ORM\Column(length: 250)]
    private ?string $manif_description = null;

    #[ORM\Column(length: 250)]
    private ?string $manif_casting = null;

    #[ORM\Column(length: 100)]
    private ?string $manif_genre = null;

    #[ORM\Column]
    private ?int $manif_prix = null;

    #[ORM\Column(length: 80)]
    private ?string $manif_affiche = null;

    #[ORM\Column(length: 20)]
    private ?string $manif_date = null;

    #[ORM\Column(length: 10)]
    private ?string $manif_horaire = null;

    #[ORM\ManyToOne(inversedBy: 'salle')]
    private ?Salles $salles = null;

    #[ORM\OneToMany(mappedBy: 'manifestation', targetEntity: Lignescommandes::class)]
    private Collection $lignescommandes;

    public function __construct()
    {
        $this->lignescommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManifTitre(): ?string
    {
        return $this->manif_titre;
    }

    public function setManifTitre(string $manif_titre): self
    {
        $this->manif_titre = $manif_titre;

        return $this;
    }

    public function getManifDescription(): ?string
    {
        return $this->manif_description;
    }

    public function setManifDescription(string $manif_description): self
    {
        $this->manif_description = $manif_description;

        return $this;
    }

    public function getManifCasting(): ?string
    {
        return $this->manif_casting;
    }

    public function setManifCasting(string $manif_casting): self
    {
        $this->manif_casting = $manif_casting;

        return $this;
    }

    public function getManifGenre(): ?string
    {
        return $this->manif_genre;
    }

    public function setManifGenre(string $manif_genre): self
    {
        $this->manif_genre = $manif_genre;

        return $this;
    }

    public function getManifPrix(): ?int
    {
        return $this->manif_prix;
    }

    public function setManifPrix(int $manif_prix): self
    {
        $this->manif_prix = $manif_prix;

        return $this;
    }

    public function getManifAffiche(): ?string
    {
        return $this->manif_affiche;
    }

    public function setManifAffiche(string $manif_affiche): self
    {
        $this->manif_affiche = $manif_affiche;

        return $this;
    }

    public function getManifDate(): ?string
    {
        return $this->manif_date;
    }

    public function setManifDate(string $manif_date): self
    {
        $this->manif_date = $manif_date;

        return $this;
    }

    public function getManifHoraire(): ?string
    {
        return $this->manif_horaire;
    }

    public function setManifHoraire(string $manif_horaire): self
    {
        $this->manif_horaire = $manif_horaire;

        return $this;
    }

    public function getSalles(): ?Salles
    {
        return $this->salles;
    }

    public function setSalles(?Salles $salles): self
    {
        $this->salles = $salles;

        return $this;
    }

    /**
     * @return Collection<int, Lignescommandes>
     */
    public function getLignescommandes(): Collection
    {
        return $this->lignescommandes;
    }

    public function addLignescommande(Lignescommandes $lignescommande): self
    {
        if (!$this->lignescommandes->contains($lignescommande)) {
            $this->lignescommandes->add($lignescommande);
            $lignescommande->setManifestation($this);
        }

        return $this;
    }

    public function removeLignescommande(Lignescommandes $lignescommande): self
    {
        if ($this->lignescommandes->removeElement($lignescommande)) {
            // set the owning side to null (unless already changed)
            if ($lignescommande->getManifestation() === $this) {
                $lignescommande->setManifestation(null);
            }
        }

        return $this;
    }
}
