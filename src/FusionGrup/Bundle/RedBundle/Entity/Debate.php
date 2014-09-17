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
     * @ORM\Column(name="pk_id_deb", type="integer")
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
     * @ORM\ManyToOne(targetEntity="TipoTema")
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

    /**
     * Set fkUsuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $fkUsuario
     * @return Debate
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
     * Set fkTipoTema
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\TipoTema $fkTipoTema
     * @return Debate
     */
    public function setFkTipoTema(\FusionGrup\Bundle\RedBundle\Entity\TipoTema $fkTipoTema = null)
    {
        $this->fkTipoTema = $fkTipoTema;

        return $this;
    }

    /**
     * Get fkTipoTema
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\TipoTema 
     */
    public function getFkTipoTema()
    {
        return $this->fkTipoTema;
    }
}
