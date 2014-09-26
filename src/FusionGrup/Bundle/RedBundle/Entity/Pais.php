<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Pais
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
     * @ORM\Column(name="nom_pas", type="string", length=50)
     */
    private $nomPas;

    public function __toString() {
        return $this->nomPas;
    }

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
     * Set nomPas
     *
     * @param string $nomPas
     * @return Pais
     */
    public function setNomPas($nomPas)
    {
        $this->nomPas = $nomPas;

        return $this;
    }

    /**
     * Get nomPas
     *
     * @return string 
     */
    public function getNomPas()
    {
        return $this->nomPas;
    }
}
