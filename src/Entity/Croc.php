<?php

namespace App\Entity;

use App\Repository\CrocRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CrocRepository::class)]
class Croc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $hauteur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?bool $aiguiser = null;

    #[ORM\Column]
    private ?bool $lime = null;

    #[ORM\Column]
    private ?bool $poli = null;

    #[ORM\Column(length: 255)]
    private ?string $NomProprietaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHauteur(): ?float
    {
        return $this->hauteur;
    }

    public function setHauteur(float $hauteur): static
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function isAiguiser(): ?bool
    {
        return $this->aiguiser;
    }

    public function setAiguiser(bool $aiguiser): static
    {
        $this->aiguiser = $aiguiser;

        return $this;
    }

    public function isLime(): ?bool
    {
        return $this->lime;
    }

    public function setLime(bool $lime): static
    {
        $this->lime = $lime;

        return $this;
    }

    public function isPoli(): ?bool
    {
        return $this->poli;
    }

    public function setPoli(bool $poli): static
    {
        $this->poli = $poli;

        return $this;
    }

    public function getNomProprietaire(): ?string
    {
        return $this->NomProprietaire;
    }

    public function setNomProprietaire(string $NomProprietaire): static
    {
        $this->NomProprietaire = $NomProprietaire;

        return $this;
    }
}
