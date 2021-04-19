<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConversationRepository::class)
 */
class Conversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="conversation")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Message::class, mappedBy="conversation", cascade={"persist", "remove"})
     */
    private $conversation;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getuser(): Collection
    {
        return $this->user;
    }

    public function adduser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setConversation($this);
        }

        return $this;
    }

    public function removeuser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getConversation() === $this) {
                $user->setConversation(null);
            }
        }

        return $this;
    }

    public function getConversation(): ?Message
    {
        return $this->conversation;
    }

    public function setConversation(Message $conversation): self
    {
        // set the owning side of the relation if necessary
        if ($conversation->getConversation() !== $this) {
            $conversation->setConversation($this);
        }

        $this->conversation = $conversation;

        return $this;
    }
}
