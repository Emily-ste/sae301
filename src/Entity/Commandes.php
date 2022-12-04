<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $commande_date = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Clients $client = null;

    #[ORM\OneToMany(mappedBy: 'commandes', targetEntity: Lignescommandes::class)]
    private Collection $ligne_commande;

    public function __construct()
    {
        $this->ligne_commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandeDate(): ?string
    {
        return $this->commande_date;
    }

    public function setCommandeDate(string $commande_date): self
    {
        $this->commande_date = $commande_date;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Lignescommandes>
     */
    public function getLigneCommande(): Collection
    {
        return $this->ligne_commande;
    }

    public function addLigneCommande(Lignescommandes $ligneCommande): self
    {
        if (!$this->ligne_commande->contains($ligneCommande)) {
            $this->ligne_commande->add($ligneCommande);
            $ligneCommande->setCommandes($this);
        }

        return $this;
    }

    public function removeLigneCommande(Lignescommandes $ligneCommande): self
    {
        if ($this->ligne_commande->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommandes() === $this) {
                $ligneCommande->setCommandes(null);
            }
        }

        return $this;
    }
}
