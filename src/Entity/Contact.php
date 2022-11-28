<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $email;

    #[ORM\Column(length: 255)]
    private string $phoneNumber;

    #[ORM\Column(length: 255)]
    private string $role;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: Host::class)]
    private Collection $HostId;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: Customer::class)]
    private Collection $CustomerId;

    public function __construct()
    {
        $this->HostId = new ArrayCollection();
        $this->CustomerId = new ArrayCollection();
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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function addHostId(Host $hostId): self
    {
        if (!$this->HostId->contains($hostId)) {
            $this->HostId->add($hostId);
            $hostId->setContact($this);
        }

        return $this;
    }

    public function removeHostId(Host $hostId): self
    {
        if ($this->HostId->removeElement($hostId)) {
            // set the owning side to null (unless already changed)
            if ($hostId->getContact() === $this) {
                $hostId->setContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Customer>
     */
    public function getCustomerId(): Collection
    {
        return $this->CustomerId;
    }

    public function addCustomerId(Customer $customerId): self
    {
        if (!$this->CustomerId->contains($customerId)) {
            $this->CustomerId->add($customerId);
            $customerId->setContact($this);
        }

        return $this;
    }

    public function removeCustomerId(Customer $customerId): self
    {
        if ($this->CustomerId->removeElement($customerId)) {
            // set the owning side to null (unless already changed)
            if ($customerId->getContact() === $this) {
                $customerId->setContact(null);
            }
        }

        return $this;
    }
}
