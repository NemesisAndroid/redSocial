<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeneroExtra
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GeneroExtra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=50)
     */
    private $genero;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_genero", type="boolean")
     */
    private $estGenero;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return GeneroExtra
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set estGenero
     *
     * @param boolean $estGenero
     * @return GeneroExtra
     */
    public function setEstGenero($estGenero)
    {
        $this->estGenero = $estGenero;

        return $this;
    }

    /**
     * Get estGenero
     *
     * @return boolean 
     */
    public function getEstGenero()
    {
        return $this->estGenero;
    }
}
