<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataExtra
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DataExtra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk_id_data", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     *
     * @ORM\ManyToOne(targetEntity="GeneroExtra")
     */
    private $fkGenero;

    /**
     * @var string
     *
     * @ORM\Column(name="extra", type="string", length=50)
     */
    private $extra;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_extra", type="boolean")
     */
    private $estExtra;





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
     * Set extra
     *
     * @param string $extra
     * @return DataExtra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string 
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set estExtra
     *
     * @param boolean $estExtra
     * @return DataExtra
     */
    public function setEstExtra($estExtra)
    {
        $this->estExtra = $estExtra;

        return $this;
    }

    /**
     * Get estExtra
     *
     * @return boolean 
     */
    public function getEstExtra()
    {
        return $this->estExtra;
    }

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return DataExtra
     */
    public function setFkUsuario(\FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario = null)
    {
        $this->fkUsuario = $fkUsuario;

        return $this;
    }

    /**
     * Get fkUsuario
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\Usuario 
     */
    public function getFkUsuario()
    {
        return $this->fkUsuario;
    }

    /**
     * Set fkGenero
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\GeneroExtra $fkGenero
     * @return DataExtra
     */
    public function setFkGenero(\FusionGrup\Bundle\RedBundle\Entity\GeneroExtra $fkGenero = null)
    {
        $this->fkGenero = $fkGenero;

        return $this;
    }

    /**
     * Get fkGenero
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\GeneroExtra 
     */
    public function getFkGenero()
    {
        return $this->fkGenero;
    }
}
