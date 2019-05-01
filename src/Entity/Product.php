<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantityUnit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantityGr;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dlc;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductRecette", mappedBy="product")
     */
    private $recette;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Freezer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $freezer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PictureProduct")
     */
    private $pictureProduct;

    public function __construct()
    {
        $this->recette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    } 

    public function getQuantityUnit(): ?int
    {
        return $this->quantityUnit;
    }

    public function setQuantityUnit(int $quantityUnit): self
    {
        $this->quantityUnit = $quantityUnit;

        return $this;
    } 

    public function getQuantityGr(): ?int
    {
        return $this->quantityGr;
    }

    public function setQuantityGr(int $quantityGr): self
    {
        $this->quantityGr = $quantityGr;

        return $this;
    } 

    public function getDlc(): ?string
    {
        return $this->dlc;
    }

    public function setDlc(string $dlc)
    {
        $this->dlc = $dlc;
        return $this;
    }

    /**
     * @return Collection|ProductRecette[]
     */
     public function getRecette()
     {
         return $this->recette;
     }

    public function addRecette(ProductRecette $recette): self
    {
        if (!$this->recette->contains($recette)) {
            $this->recette[] = $recette;
            $recette->setProduct($this);
        }

        return $this;
    }

    public function removeRecette(ProductRecette $recette): self
    {
        if ($this->recette->contains($recette)) {
            $this->recette->removeElement($recette);
            // set the owning side to null (unless already changed)
            if ($recette->getProduct() === $this) {
                $recette->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getFreezer(): ?freezer
    {
        return $this->freezer;
    }

    public function setFreezer(?freezer $freezer): self
    {
        $this->freezer = $freezer;

        return $this;
    }

    public function getPictureProduct(): ?pictureProduct
    {
        return $this->pictureProduct;
    }

    public function setPictureProduct(?pictureProduct $pictureProduct): self
    {
        $this->pictureProduct = $pictureProduct;

        return $this;
    }
}
