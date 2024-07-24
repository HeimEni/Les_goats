<?php

namespace App\Entity;

use App\Repository\BotteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BotteRepository::class)]
class Botte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $pointure = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointure(): ?int
    {
        return $this->pointure;
    }

    public function setPointure(int $pointure): static
    {
        $this->pointure = $pointure;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }
}
