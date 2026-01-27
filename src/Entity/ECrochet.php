<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class ECrochet
{
    // ------ ATTRIBUTI ---------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "float")]
    private float $size;

    #[ORM\Column(type: "boolean")]
    private bool $active = true;

    // ------- RELAZIONI ---------

    #[ORM\OneToMany(mappedBy: "crochet", targetEntity: ECreation::class)]
    private Collection $creations;

    // ------ COSTRUTTORE --------

    public function __construct(float $size)
    {
        $this->size = $size;
        $this->creations = new ArrayCollection();
    }

    // -------- GETTER & SETTER --------

    public function getId(): int
    {
        return $this->id;
    }

    public function getSize(): float
    {
        return $this->size;
    }

    public function setSize(float $size): void
    {
        $this->size = $size;
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