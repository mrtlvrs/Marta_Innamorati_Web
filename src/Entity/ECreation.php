<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class ECreation
{
    // ---------- ATTRIBUTI ----------
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    #[ORM\Column(type:"string", length:255, nullable:"false")]
    private string $title = '';

    #[ORM\Column(type:"text")]
    private string $description = '';

    #[ORM\Column(type:"text", nullable:true)]
    private ?string $accessories = null;        //opzionale

    #[ORM\Column(type:"datetime")]
    private \DateTime $createdAt;

    #[ORM\Column(type:"datetime")]
    private \DateTime $updatedAt;

    // ---------- RELAZIONI ----------

    #[ORM\ManyToOne(targetEntity:EUser::class, inversedBy:"creations")]         //no cascade: se elimino una creazione non devo eliminare l'autore
    #[ORM\JoinColumn(nullable:false)]
    private EUser $author;

    #[ORM\OneToMany(mappedBy:"creation", targetEntity:EImage::class, cascade:["persist", "remove"], orphanRemoval: true)]     #persist = salva anche le immagini quando salvi la creazione. remove = elimina anche le immagini quando elimini la creazione             
    private Collection $images;

    #[ORM\OneToMany(mappedBy:"creation", targetEntity:EComment::class, cascade:["remove"])]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy:"creation", targetEntity:ELike::class, cascade:["remove"])]
    private Collection $likes;

    #[ORM\ManyToMany(targetEntity:EUser::class, mappedBy:"savedCreations")]     //se elimino la creazione elimina anche la riga nella tabella saved (impostazione on delete cascade sul db)
    private Collection $savedBy;
    
    //ogni creazione ha ognuno dei seguenti materiali (utile per filtri)
    #[ORM\ManyToOne(targetEntity:EYarn::class, inversedBy:"creations")]
    #[ORM\JoinColumn(nullable:false)]
    private EYarn $yarn;

    #[ORM\ManyToOne(targetEntity:EYarnWeight::class, inversedBy:"creations")]
    #[ORM\JoinColumn(nullable:false)]
    private EYarnWeight $yarnWeight;

    #[ORM\ManyToOne(targetEntity:ECrochet::class, inversedBy:"creations")]
    #[ORM\JoinColumn(nullable:false)]
    private ECrochet $crochet;

    #[ORM\ManyToOne(targetEntity:ECategory::class, inversedBy:"creations")]
    #[ORM\JoinColumn(nullable:false)]
    private ECategory $category;


    // ---------- COSTRUTTORE ----------

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;

        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();

        $this->images   = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes    = new ArrayCollection();
        $this->savedBy  = new ArrayCollection();
    }

    // ---------------- GETTER E SETTER ----------------

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAccessories(): ?string
    {
        return $this->accessories;
    }

    public function setAccessories(?string $accessories): void
    {
        $this->accessories = $accessories;
        $this->updatedAt = new \DateTime();
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getAuthor(): EUser
    {
        return $this->author;
    }

    public function setAuthor(EUser $author): void
    {
        $this->author = $author;
    }

    // ---------------- RELATIONS ----------------

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(EImage $image): void
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setCreation($this);
            $this->updatedAt = new \DateTime();
        }
    }

    public function removeImage(EImage $image): void
    {
        if ($this->images->removeElement($image)) {
            if ($image->getCreation() === $this) {
                $image->setCreation(null);
            }
        }
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(EComment $comment): void
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setCreation($this);
        }
    }

    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(ELike $like): void
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setCreation($this);
        }
    }

    public function getSavedBy(): Collection
    {
        return $this->savedBy;
    }

    public function addSavedBy(EUser $user): void
    {
        if (!$this->savedBy->contains($user)) {
            $this->savedBy->add($user);
        }
    }

    //GESTIONE DEI MATERIALI
    public function getYarn(): EYarn
    {
        return $this->yarn;
    }

    public function setYarn(EYarn $yarn): void
    {
        $this->yarn = $yarn;
    }

    public function getYarnWeight(): EYarnWeight
    {
        return $this->yarnWeight;
    }

    public function setYarnWeight(EYarnWeight $yarnWeight): void
    {
        $this->yarnWeight = $yarnWeight;
    }

    public function getCrochet(): ECrochet
    {
        return $this->crochet;
    }

    public function setCrochet(ECrochet $crochet): void
    {
        $this->crochet = $crochet;
    }

    public function getCategory(): ECategory
    {
        return $this->category;
    }

    public function setCategory(ECategory $category): void
    {
        $this->category = $category;
    }

    
    //METODI AD HOC
    public function getLikesCount(): int
    {
        return $this->likes->count();
    }

    public function getCommentCount(): int
    {
        return $this->comments->count();
    }

    public function getSavedCount(): int
    {
        return $this->savedBy->count();
    }
}