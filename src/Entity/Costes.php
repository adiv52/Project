<?php

namespace App\Entity;

use App\Repository\CostesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CostesRepository::class)
 */
class Costes
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
    private $PedidoProv;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $MTS;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $MTE;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $CosteAlmProductBase;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Transporte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FactProv;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PrecioFactProv;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Extras;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="costes")
     */
    private $Product;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Observaciones;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPedidoProv(): ?string
    {
        return $this->PedidoProv;
    }

    public function setPedidoProv(?string $PedidoProv): self
    {
        $this->PedidoProv = $PedidoProv;

        return $this;
    }

    public function getMTS(): ?float
    {
        return $this->MTS;
    }

    public function setMTS(?float $MTS): self
    {
        $this->MTS = $MTS;

        return $this;
    }

    public function getMTE(): ?float
    {
        return $this->MTE;
    }

    public function setMTE(?float $MTE): self
    {
        $this->MTE = $MTE;

        return $this;
    }

    public function getCosteAlmProductBase(): ?float
    {
        return $this->CosteAlmProductBase;
    }

    public function setCosteAlmProductBase(?float $CosteAlmProductBase): self
    {
        $this->CosteAlmProductBase = $CosteAlmProductBase;

        return $this;
    }

    public function getTransporte(): ?float
    {
        return $this->Transporte;
    }

    public function setTransporte(?float $Transporte): self
    {
        $this->Transporte = $Transporte;

        return $this;
    }

    public function getFactProv(): ?string
    {
        return $this->FactProv;
    }

    public function setFactProv(?string $FactProv): self
    {
        $this->FactProv = $FactProv;

        return $this;
    }

    public function getPrecioFactProv(): ?float
    {
        return $this->PrecioFactProv;
    }

    public function setPrecioFactProv(?float $PrecioFactProv): self
    {
        $this->PrecioFactProv = $PrecioFactProv;

        return $this;
    }

    public function getExtras(): ?float
    {
        return $this->Extras;
    }

    public function setExtras(?float $Extras): self
    {
        $this->Extras = $Extras;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->Observaciones;
    }

    public function setObservaciones(?string $Observaciones): self
    {
        $this->Observaciones = $Observaciones;

        return $this;
    }
}
