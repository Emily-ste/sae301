<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
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
}
