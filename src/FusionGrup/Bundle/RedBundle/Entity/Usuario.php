<?php

namespace FusionGrup\Bundle\RedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FusionGrup\Bundle\RedBundle\Entity\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="fk_id_pas", type="integer")
     * @ORM\OneToOne(targetEntity="Pais")
     */
    private $fkIdPas;


    /**
     * @var integer
     *
     * @ORM\Column(name="fk_id_rol", type="integer")
     * @ORM\OneToOne(targetEntity="Rol")
     */

    private $fkIdRol;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_usu", type="string", length=100)
     */
    private $nomUsu;

    /**
     * @var string
     *
     * @ORM\Column(name="ape_usu", type="string", length=100)
     */
    private $apeUsu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_usu", type="date")
     */
    private $fecUsu;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_usu", type="string", length=255)
     */
    private $mailUsu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_ing", type="date")
     */
    private $fecIng;

    /**
     * @var string
     *
     * @ORM\Column(name="pass_usu", type="string", length=255)
     */
    private $passUsu;

    /**
     * @var string
     *
     * @ORM\Column(name="salt_usu", type="string", length=255)
     */
    private $salt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_usu", type="boolean")
     */
    private $estUsu;


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
     * Set fkIdPas
     *
     * @param integer $fkIdPas
     * @return Usuario
     */
    public function setFkIdPas($fkIdPas)
    {
        $this->fkIdPas = $fkIdPas;

        return $this;
    }

    /**
     * Get fkIdPas
     *
     * @return integer 
     */
    public function getFkIdPas()
    {
        return $this->fkIdPas;
    }

    /**
     * Set fkIdRol
     *
     * @param integer $fkIdRol
     * @return Usuario
     */
    public function setFkIdRol($fkIdRol)
    {
        $this->fkIdRol = $fkIdRol;

        return $this;
    }

    /**
     * Get fkIdRol
     *
     * @return integer 
     */
    public function getFkIdRol()
    {
        return $this->fkIdRol;
    }

    /**
     * Set nomUsu
     *
     * @param string $nomUsu
     * @return Usuario
     */
    public function setNomUsu($nomUsu)
    {
        $this->nomUsu = $nomUsu;

        return $this;
    }

    /**
     * Get nomUsu
     *
     * @return string 
     */
    public function getNomUsu()
    {
        return $this->nomUsu;
    }

    /**
     * Set apeUsu
     *
     * @param string $apeUsu
     * @return Usuario
     */
    public function setApeUsu($apeUsu)
    {
        $this->apeUsu = $apeUsu;

        return $this;
    }

    /**
     * Get apeUsu
     *
     * @return string 
     */
    public function getApeUsu()
    {
        return $this->apeUsu;
    }

    /**
     * Set fecUsu
     *
     * @param \DateTime $fecUsu
     * @return Usuario
     */
    public function setFecUsu($fecUsu)
    {
        $this->fecUsu = $fecUsu;

        return $this;
    }

    /**
     * Get fecUsu
     *
     * @return \DateTime 
     */
    public function getFecUsu()
    {
        return $this->fecUsu;
    }

    /**
     * Set mailUsu
     *
     * @param string $mailUsu
     * @return Usuario
     */
    public function setMailUsu($mailUsu)
    {
        $this->mailUsu = $mailUsu;

        return $this;
    }

    /**
     * Get mailUsu
     *
     * @return string 
     */
    public function getMailUsu()
    {
        return $this->mailUsu;
    }

    /**
     * Set fecIng
     *
     * @param \DateTime $fecIng
     * @return Usuario
     */
    public function setFecIng($fecIng)
    {
        $this->fecIng = $fecIng;

        return $this;
    }

    /**
     * Get fecIng
     *
     * @return \DateTime 
     */
    public function getFecIng()
    {
        return $this->fecIng;
    }

    /**
     * Set passUsu
     *
     * @param string $passUsu
     * @return Usuario
     */
    public function setPassUsu($passUsu)
    {
        $this->passUsu = $passUsu;

        return $this;
    }

    /**
     * Get passUsu
     *
     * @return string 
     */
    public function getPassUsu()
    {
        return $this->passUsu;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set estUsu
     *
     * @param boolean $estUsu
     * @return Usuario
     */
    public function setEstUsu($estUsu)
    {
        $this->estUsu = $estUsu;

        return $this;
    }

    /**
     * Get estUsu
     *
     * @return boolean 
     */
    public function getEstUsu()
    {
        return $this->estUsu;
    }
}
