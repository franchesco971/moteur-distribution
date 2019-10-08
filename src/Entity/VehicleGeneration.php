<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleGenerationRepository")
 * @ApiResource()
 */
class VehicleGeneration
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
     * @ORM\ManyToOne(targetEntity="App\Entity\VehicleModel", inversedBy="vehicleGenerations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicleModel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Finition", mappedBy="vehicleGeneration", orphanRemoval=true)
     */
    private $finitions;

    public function __construct()
    {
        $this->finitions = new ArrayCollection();
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

    public function getVehicleModel(): ?VehicleModel
    {
        return $this->vehicleModel;
    }

    public function setVehicleModel(?VehicleModel $vehicleModel): self
    {
        $this->vehicleModel = $vehicleModel;

        return $this;
    }

    /**
     * @return Collection|Finition[]
     */
    public function getFinitions(): Collection
    {
        return $this->finitions;
    }

    public function addFinition(Finition $finition): self
    {
        if (!$this->finitions->contains($finition)) {
            $this->finitions[] = $finition;
            $finition->setVehicleGeneration($this);
        }

        return $this;
    }

    public function removeFinition(Finition $finition): self
    {
        if ($this->finitions->contains($finition)) {
            $this->finitions->removeElement($finition);
            // set the owning side to null (unless already changed)
            if ($finition->getVehicleGeneration() === $this) {
                $finition->setVehicleGeneration(null);
            }
        }

        return $this;
    }
}
