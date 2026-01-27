<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class EYarnWeight
{
    // -------- ATTRIBUTI ---------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 50)]
    private string $weight;

    #[ORM\Column(type: "boolean")]
    private bool $active = true;

    // --------- RELAZIONI ---------
    #[ORM\OneToMany(mappedBy: "yarnWeight", targetEntity: ECreation::class)]
    private Collection $creations;

    // --------- COSTRUTTORE -------
    public function __construct(string $weight)
    {
        $this->weight = $weight;
        $this->creations = new ArrayCollection();
    }

    // -------- GETTER & SETTER --------

    public function getId(): int
    {
        return $this->id;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    public function getCreations(): Collection
    {
        return $this->creations;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function deactivate(): void
    {
        $this->active = false;
    }

    public function activate(): void
    {
        $this->active = true;
    }
}