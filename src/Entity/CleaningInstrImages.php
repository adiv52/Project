<?php

namespace App\Entity;

use App\Repository\CleaningInstrImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CleaningInstrImagesRepository::class)
 * @vich\Uploadable
 */
class CleaningInstrImages
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
    private $image;

    /**
     * @Vich\UploadableField(mapping="instruccionesLavado", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=Coleccion::class, inversedBy="CleaningImages")
     */
    private $coleccion;

    public function getId(): ?int
    {
        return $this->id;
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
