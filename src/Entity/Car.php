<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 * @ApiResource()
 */
class Car
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
}
