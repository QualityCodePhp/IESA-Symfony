<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="customer_order")
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_address", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

}
