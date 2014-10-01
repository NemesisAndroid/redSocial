<?php

namespace FusionGrup\Bundle\RedBundle\Entity;
use FusionGrup\Bundle\RedBundle\Entity\Rol;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FusionGrup\Bundle\RedBundle\Entity\UsuarioRepository")
 */
class Usuario implements UserInterface,  \Serializable
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
     * @var \DateTime
     *
     * @ORM\Column(name="fec_ult", type="date", nullable=true)
     */ 
    private $fecUlt;

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
    private $password;

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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumn(name="user_pais", referencedColumnName="id")
     */
    private $user_pais;

    /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="Rel_user_rol")
     */

    private $user_roles;

    public function getUsername(){
        return $this->getMailUsu();
    }

    public function getPassword(){
        return $this->password;
    }
    public function getSalt(){
        return $this->salt;
    }

    /**
     * Add user_roles
     *
     * @param Rol $userRoles
     */
    public function addRole(Rol $userRoles)
    {
        $this->user_roles[] = $userRoles;
    }
 
    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }
 
    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }
 
    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }

    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());
 
    }

    public function eraseCredentials(){

    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        /*
         * ! Don't serialize $roles field !
         */
        return \serialize(array(
            $this->id,  
            $this->mailUsu,
            $this->nomUsu,
            $this->apeUsu,
            $this->salt,
            $this->password
        ));
    }
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->mailUsu,
            $this->nomUsu,
            $this->apeUsu,
            $this->salt,
            $this->password
        ) = \unserialize($serialized);
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
     * Set fecUlt
     *
     * @param \DateTime $fecUlt
     * @return Usuario
     */
    public function setFecUlt($fecUlt)
    {
        $this->fecUlt = $fecUlt;

        return $this;
    }

    /**
     * Get fecUlt
     *
     * @return \DateTime 
     */
    public function getFecUlt()
    {
        return $this->fecUlt;
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
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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

    /**
     * Set user_pais
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Pais $userPais
     * @return Usuario
     */
    public function setUserPais(\FusionGrup\Bundle\RedBundle\Entity\Pais $userPais = null)
    {
        $this->user_pais = $userPais;

        return $this;
    }

    /**
     * Get user_pais
     *
     * @return \FusionGrup\Bundle\RedBundle\Entity\Pais 
     */
    public function getUserPais()
    {
        return $this->user_pais;
    }

    /**
     * Add user_roles
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Rol $userRoles
     * @return Usuario
     */
    public function addUserRole(\FusionGrup\Bundle\RedBundle\Entity\Rol $userRoles)
    {
        $this->user_roles[] = $userRoles;

        return $this;
    }

    /**
     * Remove user_roles
     *
     * @param \FusionGrup\Bundle\RedBundle\Entity\Rol $userRoles
     */
    public function removeUserRole(\FusionGrup\Bundle\RedBundle\Entity\Rol $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }
}
