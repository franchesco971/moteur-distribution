<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BrandRepository")
 */
class Brand
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
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicle", mappedBy="brand", orphanRemoval=true)
     */
    private $vehicles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VehicleModel", mappedBy="brand", orphanRemoval=true)
     */
    private $vehicleModels;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
        $this->vehicleModels = new ArrayCollection();
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

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setBrand($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->contains($vehicle)) {
            $this->vehicles->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getBrand() === $this) {
                $vehicle->setBrand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VehicleModel[]
     */
    public function getVehicleModels(): Collection
    {
        return $this->vehicleModels;
    }

    public function addVehicleModel(VehicleModel $vehicleModel): self
    {
        if (!$this->vehicleModels->contains($vehicleModel)) {
            $this->vehicleModels[] = $vehicleModel;
            $vehicleModel->setBrand($this);
        }

        return $this;
    }

    public function removeVehicleModel(VehicleModel $vehicleModel): self
    {
        if ($this->vehicleModels->contains($vehicleModel)) {
            $this->vehicleModels->removeElement($vehicleModel);
            // set the owning side to null (unless already changed)
            if ($vehicleModel->getBrand() === $this) {
                $vehicleModel->setBrand(null);
            }
        }

        return $this;
    }
}
