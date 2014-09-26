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
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Debate")
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

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return RespuestasDebate
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
     * Set fkDebate
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Debate $fkDebate
     * @return RespuestasDebate
     */
    public function setFkDebate(\FusionGrup\Bundle\RedBundle\Entity\Debate $fkDebate = null)
    {
        $this->fkDebate = $fkDebate;

        return $this;
    }

    /**
     * Get fkDebate
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\Debate 
     */
    public function getFkDebate()
    {
        return $this->fkDebate;
    }
}
