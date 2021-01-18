<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity=Ad::class, inversedBy="pictures")
     */
    private $ad_picture;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="picture", cascade={"persist", "remove"})
     */
    private $user_picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getAdPicture(): ?Ad
    {
        return $this->ad_picture;
    }

    public function setAdPicture(?Ad $ad_picture): self
    {
        $this->ad_picture = $ad_picture;

        return $this;
    }

    public function getUserPicture(): ?User
    {
        return $this->user_picture;
    }

    public function setUserPicture(?User $user_picture): self
    {
        $this->user_picture = $user_picture;

        return $this;
    }
}
