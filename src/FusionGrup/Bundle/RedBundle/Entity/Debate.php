<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Debate
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Debate
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
     * @ORM\Column(name="fk_tipo_tema", type="integer")
     */
    private $fkTipoTema;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_debate", type="boolean")
     */
    private $estDebate;


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
     * @return Debate
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
     * Set fkTipoTema
     *
     * @param integer $fkTipoTema
     * @return Debate
     */
    public function setFkTipoTema($fkTipoTema)
    {
        $this->fkTipoTema = $fkTipoTema;

        return $this;
    }

    /**
     * Get fkTipoTema
     *
     * @return integer 
     */
    public function getFkTipoTema()
    {
        return $this->fkTipoTema;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Debate
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set estDebate
     *
     * @param boolean $estDebate
     * @return Debate
     */
    public function setEstDebate($estDebate)
    {
        $this->estDebate = $estDebate;

        return $this;
    }

    /**
     * Get estDebate
     *
     * @return boolean 
     */
    public function getEstDebate()
    {
        return $this->estDebate;
    }
}
