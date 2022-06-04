<?php

namespace App\Entity;

use App\Repository\CleaningInstructionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CleaningInstructionsRepository::class)
 */
class CleaningInstructions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Text;

    /**
     * @ORM\ManyToOne(targetEntity=Coleccion::class, inversedBy="CleaningInstructions")
     */
    private $coleccion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(?string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getColeccion(): ?Coleccion
    {
        return $this->coleccion;
    }

    public function setColeccion(?Coleccion $coleccion): self
    {
        $this->coleccion = $coleccion;

        return $this;
    }
}
