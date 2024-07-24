<?php

namespace App\Entity;

use App\Repository\CubeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CubeRepository::class)]
#[ORM\Table(name: '`cube`')]
class Cube
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $arete = null;

    const NUMBER_OF_FACES = 6;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArete(): ?float
    {
        return $this->arete;
    }

    public function setArete(float $arete): static
    {
        $this->arete = $arete;

        return $this;
    }

    public function getNUMBER_OF_FACES(): ?int
    {
        return self::NUMBER_OF_FACES;
    }
}
