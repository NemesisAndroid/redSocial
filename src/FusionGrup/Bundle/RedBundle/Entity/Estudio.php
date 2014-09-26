<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Estudio
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
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     *
     * @ORM\ManyToOne(targetEntity="NivelEstudio")
     */
    private $fkNivelEstudio;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=50)
     */
    private $titulo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_titulo", type="boolean")
     */
    private $estTitulo;



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
     * Set titulo
     *
     * @param string $titulo
     * @return Estudio
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set estTitulo
     *
     * @param boolean $estTitulo
     * @return Estudio
     */
    public function setEstTitulo($estTitulo)
    {
        $this->estTitulo = $estTitulo;

        return $this;
    }

    /**
     * Get estTitulo
     *
     * @return boolean 
     */
    public function getEstTitulo()
    {
        return $this->estTitulo;
    }

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return Estudio
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
     * Set fkNivelEstudio
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\NivelEstudio $fkNivelEstudio
     * @return Estudio
     */
    public function setFkNivelEstudio(\FusionGrup\Bundle\RedBundle\Entity\NivelEstudio $fkNivelEstudio = null)
    {
        $this->fkNivelEstudio = $fkNivelEstudio;

        return $this;
    }

    /**
     * Get fkNivelEstudio
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\NivelEstudio 
     */
    public function getFkNivelEstudio()
    {
        return $this->fkNivelEstudio;
    }
}
