<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductOrderRepository")
 *
 * @ApiResource
 *
 */
class ProductOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Price", inversedBy="productOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderedProducts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="productOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerOrder;

    public function getId()
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderedProducts(): ?Price
    {
        return $this->orderedProducts;
    }

    public function setOrderedProducts(?Price $orderedProducts): self
    {
        $this->orderedProducts = $orderedProducts;

        return $this;
    }

    public function getCustomerOrder(): ?Order
    {
        return $this->customerOrder;
    }

    public function setCustomerOrder(?Order $customerOrder): self
    {
        $this->customerOrder = $customerOrder;

        return $this;
    }
}
