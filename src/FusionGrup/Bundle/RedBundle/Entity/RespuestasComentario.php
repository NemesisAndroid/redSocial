<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestasComentario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RespuestasComentario
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
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     * @ORM\ManyToOne(targetEntity="TipoComentario")
     */
    private $fkTipoComentario;

    /**
     * @ORM\ManyToOne(targetEntity="Comentario")
     */
    private $fkComentario;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_respuestaComentario", type="boolean")
     */
    private $estRespuestaComentario;



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
     * @return RespuestasComentario
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
     * Set estRespuestaComentario
     *
     * @param boolean $estRespuestaComentario
     * @return RespuestasComentario
     */
    public function setEstRespuestaComentario($estRespuestaComentario)
    {
        $this->estRespuestaComentario = $estRespuestaComentario;

        return $this;
    }

    /**
     * Get estRespuestaComentario
     *
     * @return boolean 
     */
    public function getEstRespuestaComentario()
    {
        return $this->estRespuestaComentario;
    }

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return RespuestasComentario
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
     * Set fkTipoComentario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\TipoComentario $fkTipoComentario
     * @return RespuestasComentario
     */
    public function setFkTipoComentario(\FusionGrup\Bundle\RedBundle\Entity\TipoComentario $fkTipoComentario = null)
    {
        $this->fkTipoComentario = $fkTipoComentario;

        return $this;
    }

    /**
     * Get fkTipoComentario
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\TipoComentario 
     */
    public function getFkTipoComentario()
    {
        return $this->fkTipoComentario;
    }

    /**
     * Set fkComentario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Comentario $fkComentario
     * @return RespuestasComentario
     */
    public function setFkComentario(\FusionGrup\Bundle\RedBundle\Entity\Comentario $fkComentario = null)
    {
        $this->fkComentario = $fkComentario;

        return $this;
    }

    /**
     * Get fkComentario
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\Comentario 
     */
    public function getFkComentario()
    {
        return $this->fkComentario;
    }
}
