<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class EImage
{
    // --------- ATTRIBUTI -----------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    // Gestione delle immagini come path nel db
    #[ORM\Column(type:"string")]
    private string $path;

    // Posizione dell'immagine nella gallery della creazione
    #[ORM\Column(type: "integer")]
    private int $position;

    // ------------ RELAZIONI ----------
    #[ORM\ManyToOne(targetEntity: ECreation::class, inversedBy: "images", cascade: ["persist"])]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]     //se elimino una creazione, elimino tutte le immagini associate
    private ECreation $creation;


    // ------------- GETTER & SETTER ---------------

    public function getId(): int
    {
        return $this->id;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getCreation(): ECreation
    {
        return $this->creation;
    }

    public function setCreation(ECreation $creation): void
    {
        $this->creation = $creation;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}