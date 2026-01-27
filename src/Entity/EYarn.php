<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class EYarn
{
    // ------- ATTRIBUTI --------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "boolean")]
    private bool $active = true;

    // ------- RELAZIONI --------

    #[ORM\OneToMany(targetEntity: ECreation::class, mappedBy: "yarns")]
    private Collection $creations;

    // ------- COSTRUTTORE -------

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->creations = new ArrayCollection();
    }

    // -------- GETTER & SETTER --------

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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