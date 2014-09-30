<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rol implements RoleInterface
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
     * @ORM\Column(name="nom_rol", type="string", length=20)
     */
    private $nomRol;

    public function getRole()
    {
        return $this->getNomRol();
    }

    public function __toString() {
        return $this->nomRol;
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
     * Set nomRol
     *
     * @param string $nomRol
     * @return Rol
     */
    public function setNomRol($nomRol)
    {
        $this->nomRol = $nomRol;

        return $this;
    }

    /**
     * Get nomRol
     *
     * @return string 
     */
    public function getNomRol()
    {
        return $this->nomRol;
    }
}
