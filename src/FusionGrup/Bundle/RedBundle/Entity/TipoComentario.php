<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoComentario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoComentario
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
     * @var string
     *
     * @ORM\Column(name="tipo_comentario", type="string", length=50)
     */
    private $tipoComentario;


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
     * Set tipoComentario
     *
     * @param string $tipoComentario
     * @return TipoComentario
     */
    public function setTipoComentario($tipoComentario)
    {
        $this->tipoComentario = $tipoComentario;

        return $this;
    }

    /**
     * Get tipoComentario
     *
     * @return string 
     */
    public function getTipoComentario()
    {
        return $this->tipoComentario;
    }
}
