<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
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
    private $numberPeople;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $timePrepa;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $timeBaking;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductRecette", mappedBy="recette")
     */
    private $productRecettes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plat;

    // /**
    //  * @ORM\Column(type="string")
    //  */
    // private $ingredientRecipe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Book")
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PictureRecette")
     */
    private $pictureRecette;

    public function __construct()
    {
        $this->productRecettes = new ArrayCollection();
        // $this->ingredientRecipe = new ArrayCollection();
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

    public function getNumberPeople(): ?int
    {
        return $this->numberPeople;
    }

    public function setNumberPeople(?int $numberPeople): self
    {
        $this->numberPeople = $numberPeople;

        return $this;
    }

    public function getTimePrepa(): ?\DateTimeInterface
    {
        return $this->timePrepa;
    }

    public function setTimePrepa(?\DateTimeInterface $timePrepa): self
    {
        $this->timePrepa = $timePrepa;

        return $this;
    }

    public function getTimeBaking(): ?\DateTimeInterface
    {
        return $this->timeBaking;
    }

    public function setTimeBaking(?\DateTimeInterface $timeBaking): self
    {
        $this->timeBaking = $timeBaking;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return Collection|ProductRecette[]
     */
    public function getProductRecettes(): Collection
    {
        return $this->productRecettes;
    }

    public function addProductRecette(ProductRecette $productRecette): self
    {
        if (!$this->productRecettes->contains($productRecette)) {
            $this->productRecettes[] = $productRecette;
            $productRecette->setRecette($this);
        }
        return $this;
    }

    public function removeProductRecette(ProductRecette $productRecette): self
    {
        if ($this->productRecettes->contains($productRecette)) {
            $this->productRecettes->removeElement($productRecette);
            // set the owning side to null (unless already changed)
            if ($productRecette->getRecette() === $this) {
                $productRecette->setRecette(null);
            }
        }
        return $this;
    }

    public function getPlat(): ?plat
    {
        return $this->plat;
    }

    public function setPlat(?plat $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getBook(): ?book
    {
        return $this->book;
    }

    public function setBook(?book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getPictureRecette(): ?pictureRecette
    {
        return $this->pictureRecette;
    }

    public function setPictureRecette(?pictureRecette $pictureRecette): self
    {
        $this->pictureRecette = $pictureRecette;

        return $this;
    }
}
