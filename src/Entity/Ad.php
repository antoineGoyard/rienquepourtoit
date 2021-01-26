<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $pieces_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\OneToOne(targetEntity=AdSupplement::class, cascade={"persist", "remove"})
     */
    private $supplement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ad_type;

    /**
     * @ORM\ManyToOne(targetEntity=HouseType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $house_type;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $short_content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="ad_picture")
     */
    private $pictures;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $published;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getPiecesNumber(): ?int
    {
        return $this->pieces_number;
    }

    public function setPiecesNumber(int $pieces_number): self
    {
        $this->pieces_number = $pieces_number;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getSupplement(): ?AdSupplement
    {
        return $this->supplement;
    }

    public function setSupplement(?AdSupplement $supplement): self
    {
        $this->supplement = $supplement;

        return $this;
    }

    public function getAdType(): ?string
    {
        return $this->ad_type;
    }

    public function setAdType(string $ad_type): self
    {
        $this->ad_type = $ad_type;

        return $this;
    }

    public function getHouseType(): ?HouseType
    {
        return $this->house_type;
    }

    public function setHouseType(?HouseType $house_type): self
    {
        $this->house_type = $house_type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getShortContent(): ?string
    {
        return $this->short_content;
    }

    public function setShortContent(string $short_content): self
    {
        $this->short_content = $short_content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }


    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setAdPicture($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getAdPicture() === $this) {
                $picture->setAdPicture(null);
            }
        }

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(?bool $published): self
    {
        $this->published = $published;

        return $this;
    }
}
