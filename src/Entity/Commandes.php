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
}
