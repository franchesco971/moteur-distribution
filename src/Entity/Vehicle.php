<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleRepository")
 * @ApiResource()
 */
class Vehicle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $buyPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fuel", inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fuel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VehicleCategory", inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicleCategory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gearbox", inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gearbox;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Transmission", inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Distribution", inversedBy="vehicles")
     */
    private $distribution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuyPrice(): ?float
    {
        return $this->buyPrice;
    }

    public function setBuyPrice(?float $buyPrice): self
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getFuel(): ?Fuel
    {
        return $this->fuel;
    }

    public function setFuel(?Fuel $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getVehicleCategory(): ?VehicleCategory
    {
        return $this->vehicleCategory;
    }

    public function setVehicleCategory(?VehicleCategory $vehicleCategory): self
    {
        $this->vehicleCategory = $vehicleCategory;

        return $this;
    }

    public function getGearbox(): ?Gearbox
    {
        return $this->gearbox;
    }

    public function setGearbox(?Gearbox $gearbox): self
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getTransmission(): ?Transmission
    {
        return $this->transmission;
    }

    public function setTransmission(?Transmission $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getDistribution(): ?Distribution
    {
        return $this->distribution;
    }

    public function setDistribution(?Distribution $distribution): self
    {
        $this->distribution = $distribution;

        return $this;
    }
}
