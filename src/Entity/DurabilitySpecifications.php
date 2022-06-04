<?php

namespace App\Entity;

use App\Repository\DurabilitySpecificationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DurabilitySpecificationsRepository::class)
 */
class DurabilitySpecifications
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
    private $TestResult;

    /**
     * @ORM\ManyToOne(targetEntity=Coleccion::class, inversedBy="DurabilitySpecifications")
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

    public function getTestResult(): ?string
    {
        return $this->TestResult;
    }

    public function setTestResult(?string $TestResult): self
    {
        $this->TestResult = $TestResult;

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
