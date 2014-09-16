<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestasDebate
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RespuestasDebate
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
     * @ORM\Column(name="fk_debate", type="integer")
     */
    private $fkDebate;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_respuesta_debate", type="boolean")
     */
    private $estRespuestaDebate;


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
     * @return RespuestasDebate
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
     * Set fkDebate
     *
     * @param integer $fkDebate
     * @return RespuestasDebate
     */
    public function setFkDebate($fkDebate)
    {
        $this->fkDebate = $fkDebate;

        return $this;
    }

    /**
     * Get fkDebate
     *
     * @return integer 
     */
    public function getFkDebate()
    {
        return $this->fkDebate;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return RespuestasDebate
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
     * Set estRespuestaDebate
     *
     * @param boolean $estRespuestaDebate
     * @return RespuestasDebate
     */
    public function setEstRespuestaDebate($estRespuestaDebate)
    {
        $this->estRespuestaDebate = $estRespuestaDebate;

        return $this;
    }

    /**
     * Get estRespuestaDebate
     *
     * @return boolean 
     */
    public function getEstRespuestaDebate()
    {
        return $this->estRespuestaDebate;
    }
}
