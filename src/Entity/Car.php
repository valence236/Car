<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class  Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $nbSeats;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $nbDoors;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $name;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?float $cost;

    #[ORM\ManyToOne(inversedBy: 'cars', cascade:["persist", "remove"])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CarCategory $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbSeats(): ?int
    {
        return $this->nbSeats;
    }

    public function setNbSeats(int $nbSeats): static
    {
        $this->nbSeats = $nbSeats;

        return $this;
    }

    public function getNbDoors(): ?int
    {
        return $this->nbDoors;
    }

    public function setNbDoors(int $nbDoors): static
    {
        $this->nbDoors = $nbDoors;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCategory(): ?CarCategory
    {
        return $this->category;
    }

    public function setCategory(?CarCategory $category): static
    {
        $this->category = $category;

        return $this;
    }
}
