<?php

namespace App\Entity;

use App\Repository\SarbacaneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SarbacaneRepository::class)]
class Sarbacane
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $longueur = null;

    #[ORM\Column(length: 50)]
    private ?string $projectileType = null;

    #[ORM\Column(length: 50)]
    private ?string $matiere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getProjectileType(): ?string
    {
        return $this->projectileType;
    }

    public function setProjectileType(string $projectileType): static
    {
        $this->projectileType = $projectileType;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): static
    {
        $this->matiere = $matiere;

        return $this;
    }
}
