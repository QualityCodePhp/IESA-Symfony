<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="blob", length=65535, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Feature", inversedBy="products")
     */
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Price", mappedBy="product", orphanRemoval=true)
     */
    private $prices;

    public function __construct()
    {
        $this->features = new ArrayCollection();
        $this->prices = new ArrayCollection();
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        if ($this->features->contains($feature)) {
            $this->features->removeElement($feature);
        }

        return $this;
    }

    /**
     * @return Collection|Price[]
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(Price $price): self
    {
        if (!$this->prices->contains($price)) {
            $this->prices[] = $price;
            $price->setProduct($this);
        }

        return $this;
    }

    public function removePrice(Price $price): self
    {
        if ($this->prices->contains($price)) {
            $this->prices->removeElement($price);
            // set the owning side to null (unless already changed)
            if ($price->getProduct() === $this) {
                $price->setProduct(null);
            }
        }

        return $this;
    }


}
