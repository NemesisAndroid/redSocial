<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestaComentario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RespuestaComentario
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
     * @ORM\Column(name="fk_tipo_comentario", type="integer")
     */
    private $fkTipoComentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="fk_comentario", type="integer")
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
     * @ORM\Column(name="est_respuesta_comentario", type="boolean")
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
     * Set fkUsuario
     *
     * @param integer $fkUsuario
     * @return RespuestaComentario
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
     * Set fkTipoComentario
     *
     * @param integer $fkTipoComentario
     * @return RespuestaComentario
     */
    public function setFkTipoComentario($fkTipoComentario)
    {
        $this->fkTipoComentario = $fkTipoComentario;

        return $this;
    }

    /**
     * Get fkTipoComentario
     *
     * @return integer 
     */
    public function getFkTipoComentario()
    {
        return $this->fkTipoComentario;
    }

    /**
     * Set fkComentario
     *
     * @param integer $fkComentario
     * @return RespuestaComentario
     */
    public function setFkComentario($fkComentario)
    {
        $this->fkComentario = $fkComentario;

        return $this;
    }

    /**
     * Get fkComentario
     *
     * @return integer 
     */
    public function getFkComentario()
    {
        return $this->fkComentario;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return RespuestaComentario
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
     * @return RespuestaComentario
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
}
