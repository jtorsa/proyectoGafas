<?php

namespace GafasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="GafasBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Add gafas
     *
     * @param \GafasBundle\Entity\Gafas $gafa
     *
     * @return Categoria
     */
    public function addGafa(\GafasBundle\Entity\Gafas $gafa)
    {
        $this->gafas[] = $gafa;

        return $this;
    }
    

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
     * Set name
     *
     * @param string $name
     *
     * @return Categoria
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @ORM\OneToMany(targetEntity="Gafas", mappedBy="categoria")
     */
    private $gafas;

    public function __construct()
    {
        $this->gafas = new ArrayCollection();
    }

    /**
     * Get gafas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGafas()
    {
        return $this->gafas;
    }

    public function __toString(){

        return $this->name;
    }
}
