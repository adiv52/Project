<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Costes::class, mappedBy="Product")
     */
    private $costes;

    public function __construct()
    {
        $this->costes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Costes[]
     */
    public function getCostes(): Collection
    {
        return $this->costes;
    }

    public function addCoste(Costes $coste): self
    {
        if (!$this->costes->contains($coste)) {
            $this->costes[] = $coste;
            $coste->setProduct($this);
        }

        return $this;
    }

    public function removeCoste(Costes $coste): self
    {
        if ($this->costes->removeElement($coste)) {
            // set the owning side to null (unless already changed)
            if ($coste->getProduct() === $this) {
                $coste->setProduct(null);
            }
        }

        return $this;
    }
}
