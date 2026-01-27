<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use InvalidArgumentException;

#[ORM\Entity]
class EUser
{

    // ---------- ATTRIBUTI ----------

    #[ORM\Id]                       #chiave primaria
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    #[ORM\Column(type:"string", length:50, unique:true)]    #evita username duplicati
    private string $username;

    #[ORM\Column(type:"string", length:100, unique:true)]   #evita email duplicati
    private string $email;

    #[ORM\Column(type:"string")]
    private string $passwordHash;

    #[ORM\Column(type:"text", nullable:true)]
    private ?string $bio = null;

    #[ORM\Column(type:"string", nullable:true)]
    private ?string $avatarPath = null;

    #[ORM\Column(type:"string", length:20)]
    private string $role = 'ROLE_USER';

    #[ORM\Column(type:"datetime")]
    private \DateTime $createdAt;

    // ---------- RELAZIONI -----------

    #[ORM\OneToMany(mappedBy:"author", targetEntity:ECreation::class, cascade:["persist", "remove"], orphanRemoval:true)]
    private Collection $creations;

    #[ORM\OneToMany(mappedBy:"author", targetEntity:EComment::class, cascade: ["remove"], orphanRemoval: true)]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy:"user", targetEntity:ELike::class, cascade: ["remove"], orphanRemoval: true)]         #User 1 — N Like N — 1 Creation
    private Collection $likes;

    #[ORM\ManyToMany(targetEntity:ECreation::class, inversedBy:"savedBy")]   #questo è il lato proprietario, l'altro lato della relazione è la proprietà savedBy in Creation
    #[ORM\JoinTable(name:"saved_creations")]
    private Collection $savedCreations;

    #[ORM\ManyToMany(targetEntity:EUser::class, inversedBy:"followers")]     #relazione molti a molti con se stessa, qui genera la tabella
    #[ORM\JoinTable(name:"follows")]                                         //quando un utente viene eliminato, il db elimina anche le righe della join table perché Doctrine mette di default in questo tipo di tabelle ON DELETE CASCADE
    private Collection $following;

    #[ORM\ManyToMany(targetEntity:EUser::class, mappedBy:"following")]       #lato inverso della relazione molti a molti con se stessa
    private Collection $followers;

    // ---------- COSTRUTTORE ----------
    public function __construct(string $username, string $email, string $passwordHash)
    {
        $username = trim($username);

        if ($username === '') {
            throw new InvalidArgumentException('Username non può essere vuoto');
        }
        
        if (empty($email)) {
        throw new \InvalidArgumentException('Email cannot be empty');
        }

        $passwordHash = trim($passwordHash);

        if ($passwordHash === '') {
            throw new InvalidArgumentException('Password non può essere vuoto');
        }

        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->email = $email;

        $this->createdAt = new \DateTime();
        $this->creations = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->savedCreations = new ArrayCollection();
        $this->following = new ArrayCollection();
        $this->followers = new ArrayCollection();
    }

    // ---------- GETTER E SETTER ----------

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $hash): void
    {
        $this->passwordHash = $hash;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }

    public function getAvatarPath(): ?string
    {
        return $this->avatarPath;
    }

    public function setAvatarPath(?string $path): void
    {
        $this->avatarPath = $path;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getCreations(): Collection
    {
        return $this->creations;
    }

    public function addCreation(ECreation $creation): void
    {
        if(!$this->creations->contains($creation)) {
            $this->creations->add($creation);
            $creation->setAuthor($this);            #la foreign key va settata sul lato "molti" della relazione, non può essere null
        }
    }

    public function removeCreation(ECreation $creation): void
    {
        $this->creations->removeElement($creation);
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function getSavedCreations(): Collection
    {
        return $this->savedCreations;
    }

    public function addSavedCreation(ECreation $creation): void
    {
        if(!$this->savedCreations->contains($creation)) {
            $this->savedCreations->add($creation);
            $creation->addSavedBy($this);
        }
    }

    public function removeSavedCreation(ECreation $creation): void
    {
        $this->savedCreations->removeElement($creation);
    }

    //GESTIONE DEL FOLLOW
    public function getFollowing(): Collection
    {
        return $this->following;
    }

    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    public function follow(EUser $user): void
    {
        if(!$this->following->contains($user)) {
            $this->following->add($user);
            $user->followers->add($this);
        }
    }

    public function unfollow(EUser $user): void
    {
        $this->following->removeElement($user);
    }

    public function isFollowing(Euser $user): bool
    {
        return $this->following->contains($user);
    }

    public function getFollowerCount(): int
    {
        return $this->followers->count();
    }

    public function getFollowingCount(): int
    {
        return $this->following->count();
    }
}