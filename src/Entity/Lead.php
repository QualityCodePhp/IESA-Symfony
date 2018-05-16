<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lead
 *
 * @ORM\Table(name="lead")
 * @ORM\Entity
 */
class Lead
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lead", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=150, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", length=150, nullable=true)
     */
    private $lastname;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=500, nullable=false)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="state", type="smallint", nullable=true)
     */
    private $state;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Customer", mappedBy="lead", cascade={"persist", "remove"})
     */
    private $customer;

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        // set (or unset) the owning side of the relation if necessary
        $newLead = $customer === null ? null : $this;
        if ($newLead !== $customer->getLead()) {
            $customer->setLead($newLead);
        }

        return $this;
    }


}
