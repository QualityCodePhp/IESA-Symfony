<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="line1", type="string", length=150, nullable=true)
     */
    private $line1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="line2", type="string", length=150, nullable=true)
     */
    private $line2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="line3", type="string", length=150, nullable=true)
     */
    private $line3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zicode", type="string", length=10, nullable=true)
     */
    private $zicode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="adresses")
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
