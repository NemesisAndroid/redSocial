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
     * @ORM\Column(name="fk_usuario", type="integer")
     * @ORM\OneToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="fk_genero", type="integer")
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
     * Set fkUsuario
     *
     * @param integer $fkUsuario
     * @return DataExtra
     */
    public function setFkUsuario($fkUsuario)
    {
        $this->fkUsuario = $fkUsuario;

        return $this;
    }

    /**
     * Get fkUsuario
     *
     * @return integer 
     */
    public function getFkUsuario()
    {
        return $this->fkUsuario;
    }

    /**
     * Set fkGenero
     *
     * @param integer $fkGenero
     * @return DataExtra
     */
    public function setFkGenero($fkGenero)
    {
        $this->fkGenero = $fkGenero;

        return $this;
    }

    /**
     * Get fkGenero
     *
     * @return integer 
     */
    public function getFkGenero()
    {
        return $this->fkGenero;
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
}
