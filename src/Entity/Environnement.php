<?php

namespace App\Entity;

use App\Repository\EnvironnementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnvironnementRepository::class)]
class Environnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $link;

    #[ORM\Column(length: 255)]
    private string $ipAdress;

    #[ORM\Column]
    private int $sshPort;

    #[ORM\Column(length: 255)]
    private string $sshUserName;

    #[ORM\Column(length: 255)]
    private string $phpmyadminLinkLink;

    #[ORM\Column]
    private bool $ipRestriction;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Project $ProjectId = null;

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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getIpAdress(): ?string
    {
        return $this->ipAdress;
    }

    public function setIpAdress(string $ipAdress): self
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    public function getSshPort(): ?int
    {
        return $this->sshPort;
    }

    public function setSshPort(int $sshPort): self
    {
        $this->sshPort = $sshPort;

        return $this;
    }

    public function getSshUserName(): ?string
    {
        return $this->sshUserName;
    }

    public function setSshUserName(string $sshUserName): self
    {
        $this->sshUserName = $sshUserName;

        return $this;
    }

    public function getPhpmyadminLinkLink(): ?string
    {
        return $this->phpmyadminLinkLink;
    }

    public function setPhpmyadminLinkLink(string $phpmyadminLinkLink): self
    {
        $this->phpmyadminLinkLink = $phpmyadminLinkLink;

        return $this;
    }

    public function isIpRestriction(): ?bool
    {
        return $this->ipRestriction;
    }

    public function setIpRestriction(bool $ipRestriction): self
    {
        $this->ipRestriction = $ipRestriction;

        return $this;
    }

    public function getProjectId(): ?Project
    {
        return $this->ProjectId;
    }

    public function setProjectId(?Project $ProjectId): self
    {
        $this->ProjectId = $ProjectId;

        return $this;
    }
}
