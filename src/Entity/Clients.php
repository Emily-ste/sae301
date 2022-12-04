<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $email = null;

    #[ORM\Column(length: 120)]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */

    #[ORM\Column(length: 100)]
    private ?string $client_nom = null;

    #[ORM\Column(length: 120)]
    private ?string $client_prenom = null;

    #[ORM\Column(length: 120)]
    private ?string $client_adr_rue = null;

    #[ORM\Column(length: 120)]
    private ?string $client_adr_ville = null;

    #[ORM\Column]
    private ?int $client_adr_cp = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Commandes::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Commandes>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }
}
