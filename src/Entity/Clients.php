<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $client_email = null;

    #[ORM\Column(length: 100)]
    private ?string $client_nom = null;

    #[ORM\Column(length: 120)]
    private ?string $client_prenom = null;

    #[ORM\Column(length: 120)]
    private ?string $client_password = null;

    #[ORM\Column(length: 120)]
    private ?string $client_adr_rue = null;

    #[ORM\Column(length: 120)]
    private ?string $client_adr_ville = null;

    #[ORM\Column]
    private ?int $client_adr_cp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientEmail(): ?string
    {
        return $this->client_email;
    }

    public function setClientEmail(string $client_email): self
    {
        $this->client_email = $client_email;

        return $this;
    }

    public function getClientNom(): ?string
    {
        return $this->client_nom;
    }

    public function setClientNom(string $client_nom): self
    {
        $this->client_nom = $client_nom;

        return $this;
    }

    public function getClientPrenom(): ?string
    {
        return $this->client_prenom;
    }

    public function setClientPrenom(string $client_prenom): self
    {
        $this->client_prenom = $client_prenom;

        return $this;
    }

    public function getClientPassword(): ?string
    {
        return $this->client_password;
    }

    public function setClientPassword(string $client_password): self
    {
        $this->client_password = $client_password;

        return $this;
    }

    public function getClientAdrRue(): ?string
    {
        return $this->client_adr_rue;
    }

    public function setClientAdrRue(string $client_adr_rue): self
    {
        $this->client_adr_rue = $client_adr_rue;

        return $this;
    }

    public function getClientAdrVille(): ?string
    {
        return $this->client_adr_ville;
    }

    public function setClientAdrVille(string $client_adr_ville): self
    {
        $this->client_adr_ville = $client_adr_ville;

        return $this;
    }

    public function getClientAdrCp(): ?int
    {
        return $this->client_adr_cp;
    }

    public function setClientAdrCp(int $client_adr_cp): self
    {
        $this->client_adr_cp = $client_adr_cp;

        return $this;
    }
}
