<?php

namespace App\Entity;

use App\Repository\ColeccionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ColeccionRepository::class)
 * @vich\Uploadable
 */
class Coleccion
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
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ProductGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Aplications;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Composition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StaticCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DyeingMethod;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AvailableColours;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Length;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GSM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="colection", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity=CleaningInstructions::class, mappedBy="coleccion", cascade={"remove","persist"})
     */
    private $CleaningInstructions;

    /**
     * @ORM\OneToMany(targetEntity=CleaningSpecifications::class, mappedBy="coleccion", cascade={"remove","persist"})
     */
    private $CleaningSpecifications;

    /**
     * @ORM\OneToMany(targetEntity=DurabilitySpecifications::class, mappedBy="coleccion", cascade={"remove","persist"})
     */
    private $DurabilitySpecifications;

    /**
     * @ORM\OneToMany(targetEntity=ProcessingSpecifications::class, mappedBy="coleccion", cascade={"remove","persist"})
     */
    private $ProcessingSpecifications;

    /**
     * @ORM\OneToMany(targetEntity=CleaningInstrImages::class, mappedBy="coleccion", cascade={"remove","persist"})
     */
    private $CleaningImages;

    public function __construct()
    {
        $this->CleaningInstructions = new ArrayCollection();
        $this->CleaningSpecifications = new ArrayCollection();
        $this->DurabilitySpecifications = new ArrayCollection();
        $this->ProcessingSpecifications = new ArrayCollection();
        $this->CleaningImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(?string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getProductGroup(): ?string
    {
        return $this->ProductGroup;
    }

    public function setProductGroup(?string $ProductGroup): self
    {
        $this->ProductGroup = $ProductGroup;

        return $this;
    }

    public function getAplications(): ?string
    {
        return $this->Aplications;
    }

    public function setAplications(?string $Aplications): self
    {
        $this->Aplications = $Aplications;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->Composition;
    }

    public function setComposition(?string $Composition): self
    {
        $this->Composition = $Composition;

        return $this;
    }

    public function getStaticCode(): ?string
    {
        return $this->StaticCode;
    }

    public function setStaticCode(?string $StaticCode): self
    {
        $this->StaticCode = $StaticCode;

        return $this;
    }

    public function getDyeingMethod(): ?string
    {
        return $this->DyeingMethod;
    }

    public function setDyeingMethod(?string $DyeingMethod): self
    {
        $this->DyeingMethod = $DyeingMethod;

        return $this;
    }

    public function getAvailableColours(): ?string
    {
        return $this->AvailableColours;
    }

    public function setAvailableColours(?string $AvailableColours): self
    {
        $this->AvailableColours = $AvailableColours;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->Width;
    }

    public function setWidth(?int $Width): self
    {
        $this->Width = $Width;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->Length;
    }

    public function setLength(?int $Length): self
    {
        $this->Length = $Length;

        return $this;
    }

    public function getGSM(): ?int
    {
        return $this->GSM;
    }

    public function setGSM(?int $GSM): self
    {
        $this->GSM = $GSM;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return $this
     */
    public function setImage(?string $image):self
    {
        $this->image= $image;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
       return $this->imageFile; 
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile= null)
    {
        $this->imageFile= $imageFile;
    }

    /**
     * @return Collection<int, CleaningInstructions>
     */
    
    public function getCleaningInstructions(): Collection
    {
        return $this->CleaningInstructions;
    }

    public function addCleaningInstruction(CleaningInstructions $cleaningInstruction): self
    {
        if (!$this->CleaningInstructions->contains($cleaningInstruction)) {
            $this->CleaningInstructions[] = $cleaningInstruction;
            $cleaningInstruction->setColeccion($this);
        }

        return $this;
    }

    public function removeCleaningInstruction(CleaningInstructions $cleaningInstruction): self
    {
        if ($this->CleaningInstructions->removeElement($cleaningInstruction)) {
            // set the owning side to null (unless already changed)
            if ($cleaningInstruction->getColeccion() === $this) {
                $cleaningInstruction->setColeccion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CleaningSpecifications>
     */
    public function getCleaningSpecifications(): Collection
    {
        return $this->CleaningSpecifications;
    }

    public function addCleaningSpecification(CleaningSpecifications $cleaningSpecification): self
    {
        if (!$this->CleaningSpecifications->contains($cleaningSpecification)) {
            $this->CleaningSpecifications[] = $cleaningSpecification;
            $cleaningSpecification->setColeccion($this);
        }

        return $this;
    }

    public function removeCleaningSpecification(CleaningSpecifications $cleaningSpecification): self
    {
        if ($this->CleaningSpecifications->removeElement($cleaningSpecification)) {
            // set the owning side to null (unless already changed)
            if ($cleaningSpecification->getColeccion() === $this) {
                $cleaningSpecification->setColeccion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DurabilitySpecifications>
     */
    public function getDurabilitySpecifications(): Collection
    {
        return $this->DurabilitySpecifications;
    }

    public function addDurabilitySpecification(DurabilitySpecifications $durabilitySpecification): self
    {
        if (!$this->DurabilitySpecifications->contains($durabilitySpecification)) {
            $this->DurabilitySpecifications[] = $durabilitySpecification;
            $durabilitySpecification->setColeccion($this);
        }

        return $this;
    }

    public function removeDurabilitySpecification(DurabilitySpecifications $durabilitySpecification): self
    {
        if ($this->DurabilitySpecifications->removeElement($durabilitySpecification)) {
            // set the owning side to null (unless already changed)
            if ($durabilitySpecification->getColeccion() === $this) {
                $durabilitySpecification->setColeccion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProcessingSpecifications>
     */
    public function getProcessingSpecifications(): Collection
    {
        return $this->ProcessingSpecifications;
    }

    public function addProcessingSpecification(ProcessingSpecifications $processingSpecification): self
    {
        if (!$this->ProcessingSpecifications->contains($processingSpecification)) {
            $this->ProcessingSpecifications[] = $processingSpecification;
            $processingSpecification->setColeccion($this);
        }

        return $this;
    }

    public function removeProcessingSpecification(ProcessingSpecifications $processingSpecification): self
    {
        if ($this->ProcessingSpecifications->removeElement($processingSpecification)) {
            // set the owning side to null (unless already changed)
            if ($processingSpecification->getColeccion() === $this) {
                $processingSpecification->setColeccion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CleaningInstrImages>
     */
    public function getCleaningImages(): Collection
    {
        return $this->CleaningImages;
    }

    public function addCleaningImage(CleaningInstrImages $cleaningImage): self
    {
        if (!$this->CleaningImages->contains($cleaningImage)) {
            $this->CleaningImages[] = $cleaningImage;
            $cleaningImage->setColeccion($this);
        }

        return $this;
    }

    public function removeCleaningImage(CleaningInstrImages $cleaningImage): self
    {
        if ($this->CleaningImages->removeElement($cleaningImage)) {
            // set the owning side to null (unless already changed)
            if ($cleaningImage->getColeccion() === $this) {
                $cleaningImage->setColeccion(null);
            }
        }

        return $this;
    }
}
