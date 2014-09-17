<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NivelEstudio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class NivelEstudio
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
     * @ORM\Column(name="nivel", type="string", length=50)
     */
    private $nivel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estNivel", type="boolean")
     */
    private $estNivel;



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
     * Set nivel
     *
     * @param string $nivel
     * @return NivelEstudio
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set estNivel
     *
     * @param boolean $estNivel
     * @return NivelEstudio
     */
    public function setEstNivel($estNivel)
    {
        $this->estNivel = $estNivel;

        return $this;
    }

    /**
     * Get estNivel
     *
     * @return boolean 
     */
    public function getEstNivel()
    {
        return $this->estNivel;
    }
}
