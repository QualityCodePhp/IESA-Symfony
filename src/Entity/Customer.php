<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false, options={"unsigned"=true})
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="number_orders", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $numberOrders = '0';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="customer", orphanRemoval=true)
     */
    private $adresses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="customer", orphanRemoval=true)
     */
    private $orders;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Lead", inversedBy="customer", cascade={"persist", "remove"})
     */
    private $lead;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    /**
     * @return Collection|Address[]
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Address $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses[] = $adress;
            $adress->setCustomer($this);
        }

        return $this;
    }

    public function removeAdress(Address $adress): self
    {
        if ($this->adresses->contains($adress)) {
            $this->adresses->removeElement($adress);
            // set the owning side to null (unless already changed)
            if ($adress->getCustomer() === $this) {
                $adress->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setCustomer($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getCustomer() === $this) {
                $order->setCustomer(null);
            }
        }

        return $this;
    }

    public function getLead(): ?Lead
    {
        return $this->lead;
    }

    public function setLead(?Lead $lead): self
    {
        $this->lead = $lead;

        return $this;
    }


}
