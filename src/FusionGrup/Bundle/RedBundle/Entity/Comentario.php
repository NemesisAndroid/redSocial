<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk_id_comentario", type="integer")
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
     * @ORM\ManyToOne(targetEntity="TipoComentario")
     */
    private $fkTipoComentario;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="string", length=255)
     */
    private $contenido;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_comentario", type="boolean")
     */
    private $estComentario;





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
     * @return Comentario
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
     * Set estComentario
     *
     * @param boolean $estComentario
     * @return Comentario
     */
    public function setEstComentario($estComentario)
    {
        $this->estComentario = $estComentario;

        return $this;
    }

    /**
     * Get estComentario
     *
     * @return boolean 
     */
    public function getEstComentario()
    {
        return $this->estComentario;
    }

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return Comentario
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
     * @param \FusionGrup\Bundle\RedBundle\Entity\fkTipoComentario $fkTipoComentario
     * @return Comentario
     */
    public function setFkTipoComentario(\FusionGrup\Bundle\RedBundle\Entity\fkTipoComentario $fkTipoComentario = null)
    {
        $this->fkTipoComentario = $fkTipoComentario;

        return $this;
    }

    /**
     * Get fkTipoComentario
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\fkTipoComentario 
     */
    public function getFkTipoComentario()
    {
        return $this->fkTipoComentario;
    }
}
