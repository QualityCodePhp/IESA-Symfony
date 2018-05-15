<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderProducts
 *
 * @ORM\Table(name="order_products", indexes={@ORM\Index(name="id_customer_order", columns={"id_customer_order"}), @ORM\Index(name="id_price", columns={"id_price"}), @ORM\Index(name="id_product", columns={"id_product"})})
 * @ORM\Entity
 */
class OrderProducts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_products", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrderProducts;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="smallint", nullable=false, options={"default"="1"})
     */
    private $quantity = '1';

    /**
     * @var \CustomerOrder
     *
     * @ORM\ManyToOne(targetEntity="CustomerOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer_order", referencedColumnName="id_customer_order")
     * })
     */
    private $idCustomerOrder;

    /**
     * @var \Price
     *
     * @ORM\ManyToOne(targetEntity="Price")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_price", referencedColumnName="id_price")
     * })
     */
    private $idPrice;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     * })
     */
    private $idProduct;


}
