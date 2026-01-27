<?php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class EComment
{
    // ---------- ATTRIBUTI ----------

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    #[ORM\Column(type:"text", nullable:"false")]
    private string $text;

    #[ORM\Column(type:"datetime")]
    private \DateTime $createdAt;

    // ---------- RELAZIONI ----------

    #[ORM\ManyToOne(targetEntity:EUser::class, inversedBy:"comments")]
    #[ORM\JoinColumn(nullable:false)]
    private EUser $author;

    #[ORM\ManyToOne(targetEntity:ECreation::class, inversedBy:"comments")]
    #[ORM\JoinColumn(nullable:false)]
    private ECreation $creation;

    # ---------- COSTRUTTORE ----------

    public function __construct(string $text)
    {
        $this->text = $text;
        $this->createdAt = new \DateTime();
    }

    # ---------- GETTER E SETTER ----------
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getAuthor(): EUser
    {
        return $this->author;
    }

    public function setAuthor(EUser $author): void
    {
        $this->author = $author;
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