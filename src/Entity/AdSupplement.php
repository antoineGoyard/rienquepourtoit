<?php

namespace App\Entity;

use App\Repository\AdSupplementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdSupplementRepository::class)
 */
class AdSupplement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $energy_class;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bathroom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pool;

    /**
     * @ORM\Column(type="text")
     */
    private $long_content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rooms_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGarden(): ?bool
    {
        return $this->garden;
    }

    public function setGarden(?bool $garden): self
    {
        $this->garden = $garden;

        return $this;
    }

    public function getEnergyClass(): ?string
    {
        return $this->energy_class;
    }

    public function setEnergyClass(?string $energy_class): self
    {
        $this->energy_class = $energy_class;

        return $this;
    }

    public function getBathroom(): ?int
    {
        return $this->bathroom;
    }

    public function setBathroom(?int $bathroom): self
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    public function getWc(): ?int
    {
        return $this->wc;
    }

    public function setWc(?int $wc): self
    {
        $this->wc = $wc;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getPool(): ?bool
    {
        return $this->pool;
    }

    public function setPool(?bool $pool): self
    {
        $this->pool = $pool;

        return $this;
    }

    public function getLongContent(): ?string
    {
        return $this->long_content;
    }

    public function setLongContent(string $long_content): self
    {
        $this->long_content = $long_content;

        return $this;
    }

    public function getRoomsNumber(): ?int
    {
        return $this->rooms_number;
    }

    public function setRoomsNumber(?int $rooms_number): self
    {
        $this->rooms_number = $rooms_number;

        return $this;
    }
}
