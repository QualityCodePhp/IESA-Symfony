<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductFeatures
 *
 * @ORM\Table(name="product_features", indexes={@ORM\Index(name="id_product", columns={"id_product"}), @ORM\Index(name="id_feature", columns={"id_feature"})})
 * @ORM\Entity
 */
class ProductFeatures
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product_features", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProductFeatures;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     * })
     */
    private $idProduct;

    /**
     * @var \Feature
     *
     * @ORM\ManyToOne(targetEntity="Feature")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_feature", referencedColumnName="id_feature")
     * })
     */
    private $idFeature;


}
