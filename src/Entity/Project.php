<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $code;

    #[ORM\Column(length: 255)]
    private string $lastpassFolder;

    #[ORM\Column(length: 255)]
    private string $linkMockUps;

    #[ORM\Column]
    private bool $manageServer;

    #[ORM\Column(type: Types::TEXT)]
    private string $notes;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    private Host $HostId;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    private Customer $CustomerId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLastpassFolder(): ?string
    {
        return $this->lastpassFolder;
    }

    public function setLastpassFolder(string $lastpassFolder): self
    {
        $this->lastpassFolder = $lastpassFolder;

        return $this;
    }

    public function getLinkMockUps(): ?string
    {
        return $this->linkMockUps;
    }

    public function setLinkMockUps(string $linkMockUps): self
    {
        $this->linkMockUps = $linkMockUps;

        return $this;
    }

    public function isManageServer(): ?bool
    {
        return $this->manageServer;
    }

    public function setManageServer(bool $manageServer): self
    {
        $this->manageServer = $manageServer;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getHostId(): ?Host
    {
        return $this->HostId;
    }

    public function setHostId(?Host $HostId): self
    {
        $this->HostId = $HostId;

        return $this;
    }

    public function getCustomerId(): ?Customer
    {
        return $this->CustomerId;
    }

    public function setCustomerId(?Customer $CustomerId): self
    {
        $this->CustomerId = $CustomerId;

        return $this;
    }
}
