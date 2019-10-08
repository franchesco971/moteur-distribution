<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleModelRepository")
 * @ApiResource()
 */
class VehicleModel
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="vehicleModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VehicleGeneration", mappedBy="vehicleModel", orphanRemoval=true)
     */
    private $vehicleGenerations;

    public function __construct()
    {
        $this->vehicleGenerations = new ArrayCollection();
    }

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

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|VehicleGeneration[]
     */
    public function getVehicleGenerations(): Collection
    {
        return $this->vehicleGenerations;
    }

    public function addVehicleGeneration(VehicleGeneration $vehicleGeneration): self
    {
        if (!$this->vehicleGenerations->contains($vehicleGeneration)) {
            $this->vehicleGenerations[] = $vehicleGeneration;
            $vehicleGeneration->setVehicleModel($this);
        }

        return $this;
    }

    public function removeVehicleGeneration(VehicleGeneration $vehicleGeneration): self
    {
        if ($this->vehicleGenerations->contains($vehicleGeneration)) {
            $this->vehicleGenerations->removeElement($vehicleGeneration);
            // set the owning side to null (unless already changed)
            if ($vehicleGeneration->getVehicleModel() === $this) {
                $vehicleGeneration->setVehicleModel(null);
            }
        }

        return $this;
    }
}
