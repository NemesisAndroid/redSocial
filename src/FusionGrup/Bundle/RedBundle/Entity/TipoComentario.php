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
     * @ORM\Column(name="tipo_comentarioç", type="string", length=50)
     */
    private $tipoComentarioç;


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
     * Set tipoComentarioç
     *
     * @param string $tipoComentarioç
     * @return TipoComentario
     */
    public function setTipoComentarioç($tipoComentarioç)
    {
        $this->tipoComentarioç = $tipoComentarioç;

        return $this;
    }

    /**
     * Get tipoComentarioç
     *
     * @return string 
     */
    public function getTipoComentarioç()
    {
        return $this->tipoComentarioç;
    }
}
