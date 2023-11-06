<?php

namespace App\Entity;

use App\Repository\StudioDanimationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudioDanimationRepository::class)]
class StudioDanimation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomStudio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStudio(): ?string
    {
        return $this->nomStudio;
    }

    public function setNomStudio(string $nomStudio): static
    {
        $this->nomStudio = $nomStudio;

        return $this;
    }
}
