<?php

namespace GafasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carro
 *
 * @ORM\Table(name="carro")
 * @ORM\Entity(repositoryClass="GafasBundle\Repository\CarroRepository")
 */
class Carro
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
     * @var int
     *
     * @ORM\Column(name="producto", type="integer")
     */
    private $producto;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var int
     *
     * @ORM\Column(name="user", type="integer")
     */
    private $user;


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
     * Set id
     *
     * @param integer $id
     *
     * @return Carro
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set producto
     *
     * @param integer $producto
     *
     * @return Carro
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return int
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Carro
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }


    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Carro
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Carro
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

