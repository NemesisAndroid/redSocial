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
     * @ORM\Column(name="fk_usuario", type="integer")
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $fkUsuario;

    /**
     *
     * @ORM\Column(name="fk_tipo_comentario", type="integer")
     * @ORM\ManyToOne(targetEntity="fkTipoComentario")
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



}
