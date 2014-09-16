<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Estudios
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
     * @var integer
     *
     * @ORM\Column(name="fk_usuario", type="integer")
     */
    private $fkUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="fk_nivelEstudio", type="integer")
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
     * Set fkUsuario
     *
     * @param integer $fkUsuario
     * @return Estudios
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
     * Set fkNivelEstudio
     *
     * @param integer $fkNivelEstudio
     * @return Estudios
     */
    public function setFkNivelEstudio($fkNivelEstudio)
    {
        $this->fkNivelEstudio = $fkNivelEstudio;

        return $this;
    }

    /**
     * Get fkNivelEstudio
     *
     * @return integer 
     */
    public function getFkNivelEstudio()
    {
        return $this->fkNivelEstudio;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Estudios
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
     * @return Estudios
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
}
