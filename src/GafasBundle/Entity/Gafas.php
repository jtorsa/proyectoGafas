<?php

namespace GafasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gafas
 *
 * @ORM\Table(name="gafas")
 * @ORM\Entity(repositoryClass="GafasBundle\Repository\GafasRepository")
 */
class Gafas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, unique=true)
     */
    private $model;


      /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     *@ORM\ManyToOne(targetEntity="Categoria", inversedBy="gafas")
     *@ORM\JoinColumn(name="categoria", referencedColumnName="id") 
     */
    private $categoria;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Gafas
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set categoria
     *
     * @param int $categoria
     *
     * @return Gafas
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return int
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Gafas
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Gafas
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}

