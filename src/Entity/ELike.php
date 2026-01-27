<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ELike
{
    // ---------- ATTRIBUTI ----------

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    // ---------- RELAZIONI ----------

    #[ORM\ManyToOne(targetEntity:EUser::class, inversedBy:"likes")]
    #[ORM\JoinColumn(nullable:false)]
    private EUser $user;

    #[ORM\ManyToOne(targetEntity:ECreation::class, inversedBy:"likes")]
    #[ORM\JoinColumn(nullable:false)]
    private ECreation $creation;

    # ---------- COSTRUTTORE ----------

    public function __construct(EUser $user, ECreation $creation)
    {
        $this->user = $user;
        $this->creation = $creation;
    }

    # ---------- GETTER E SETTER ----------
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): EUser
    {
        return $this->user;
    }

    public function setUser(EUser $user): void
    {
        $this->user = $user;
    }

    public function getCreation(): ECreation
    {
        return $this->creation;
    }

    public function setCreation(ECreation $creation): void
    {
        $this->creation = $creation;
    }
}