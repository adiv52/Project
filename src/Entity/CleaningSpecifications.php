<?php

namespace App\Entity;

use App\Repository\CleaningSpecificationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CleaningSpecificationsRepository::class)
 */
class CleaningSpecifications
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TestName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TestSpecification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Unit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Warp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Weft;

    /**
     * @ORM\ManyToOne(targetEntity=Coleccion::class, inversedBy="CleaningSpecifications")
     */
    private $coleccion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestName(): ?string
    {
        return $this->TestName;
    }

    public function setTestName(?string $TestName): self
    {
        $this->TestName = $TestName;

        return $this;
    }

    public function getTestSpecification(): ?string
    {
        return $this->TestSpecification;
    }

    public function setTestSpecification(?string $TestSpecification): self
    {
        $this->TestSpecification = $TestSpecification;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->Unit;
    }

    public function setUnit(?string $Unit): self
    {
        $this->Unit = $Unit;

        return $this;
    }

    public function getWarp(): ?string
    {
        return $this->Warp;
    }

    public function setWarp(?string $Warp): self
    {
        $this->Warp = $Warp;

        return $this;
    }

    public function getWeft(): ?string
    {
        return $this->Weft;
    }

    public function setWeft(?string $Weft): self
    {
        $this->Weft = $Weft;

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
