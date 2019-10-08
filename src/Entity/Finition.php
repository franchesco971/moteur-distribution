<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FinitionRepository")
 * @ApiResource()
 */
class Finition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VehicleGeneration", inversedBy="finitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicleGeneration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getVehicleGeneration(): ?VehicleGeneration
    {
        return $this->vehicleGeneration;
    }

    public function setVehicleGeneration(?VehicleGeneration $vehicleGeneration): self
    {
        $this->vehicleGeneration = $vehicleGeneration;

        return $this;
    }
}
