<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", indexes={@ORM\Index(name="id_customer", columns={"id_customer"})})
 * @ORM\Entity
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_address", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAddress;

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
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     * })
     */
    private $idCustomer;


}
