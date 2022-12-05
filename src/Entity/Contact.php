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
    private Collection $host;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: Customer::class)]
    private Collection $customer;

    public function __construct()
    {
        $this->host = new ArrayCollection();
        $this->customer = new ArrayCollection();
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

    public function addHost(Host $host): self
    {
        if (!$this->host->contains($host)) {
            $this->host->add($host);
            $host->setContact($this);
        }

        return $this;
    }

    public function removeHost(Host $host): self
    {
        if ($this->HostId->removeElement($host)) {
            // set the owning side to null (unless already changed)
            if ($host->getContact() === $this) {
                $host->setContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Customer>
     */
    public function getCustomer(): Collection
    {
        return $this->customer;
    }

    public function addCustomer(Customer $customer): self
    {
        if (!$this->customer->contains($customer)) {
            $this->customer->add($customer);
            $customer->setContact($this);
        }

        return $this;
    }

    public function removeCustomer(Customer $customer): self
    {
        if ($this->customer->removeElement($customer)) {
            // set the owning side to null (unless already changed)
            if ($customer->getContact() === $this) {
                $customer->setContact(null);
            }
        }

        return $this;
    }
}
