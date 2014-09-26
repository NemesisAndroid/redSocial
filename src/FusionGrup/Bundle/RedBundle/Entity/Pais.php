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


      /**
       *
       * @ORM\OneToMany(targetEntity="Usuario", mappedBy="user_pais")
       */
      private $usuario;

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

    public function __toString() {
        return $this->getNomPas();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $usuario
     * @return Pais
     */
    public function addUsuario(\FusionGrup\Bundle\RedBundle\Entity\Usuario $usuario)
    {
        $this->usuario[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Usuario $usuario
     */
    public function removeUsuario(\FusionGrup\Bundle\RedBundle\Entity\Usuario $usuario)
    {
        $this->usuario->removeElement($usuario);
    }

    /**
     * Get usuario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
