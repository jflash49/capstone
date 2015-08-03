<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Serializable;
/**
 * User
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="Capstone\SetupBundle\Entity\UserRepository")
 * @UniqueEntity(fields="username", message="Username Taken")
 * @UniqueEntity(fields="email", message="Email Taken")
 */
class User implements AdvancedUserInterface, Serializable
{
    /**
     * @var integer
     */
    private $userid;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=255)
     * @Assert\NotBlank(message="Please Enter Username")
     * @Assert\Length(min=3, minMessage="Username must be atleast 3 characters!")
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     * 
     * @ORM\Column(type="json_array")
     * 
     */
    private $roles = array();

    /**
     * @var \Capstone\SetupBundle\Entity\UserInfo
     */
    private $info;

    /**
    * @var bool
    *
    * @ORM\Column(type="boolean")
    */
    private $isActive = true;
    
   /**
    * @Assert\NotBlank
    * @Assert\Regex(pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/", message="Use 1 upper case letter, 1 lower case letter, and 1 number")
    */
    private $plainPassword;
    
    
    
    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return User
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string 
     */
    public function getRoles()
    {
	$roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return  array_unique($roles);
    }

    public function eraseCredentials()
    {
	$this->setPlainPassword(null);
    }

    public function getSalt()
    {
	return null;
    }

    /**
     * Set info
     *
     * @param \Capstone\SetupBundle\Entity\UserInfo $info
     * @return User
     */
    public function setInfo(\Capstone\SetupBundle\Entity\UserInfo $info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return \Capstone\SetupBundle\Entity\UserInfo 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    
    public function isAccountNonExpired()
    {
	return true;
    }

    public function isAccountNonLocked()
    {
	return true;
    }

    public function isCredentialsNonExpired()
    {
	return true;
    }

    public function isEnabled()
    {
	return $this->getIsActive();
    }
    
    /**
     * This function serializes the user information
     * See Symfony Serializable Class
     */
    public function serialize()
    {
        return serialize(array(
        $this->userid,
        $this->username,
        $this->password,
    ));
    }
    
    /**
     * This function unserializes the user information
     * See Symfony Serializable Class
     */
    public function unserialize($serialized)
    {
        list (
        $this->userid,
        $this->username,
        $this->password,
    ) = unserialize($serialized);
    }

    /**
     * Get plainPassword
     *
     * @return plainPassword
     */
    public function getPlainPassword()
    {
	return $this->plainPassword;
    }
    /**
     * Set plainPassword
     *
     * @return plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
	$this->plainPassword = $plainPassword;

	return $this;
      }
      
   
    public function __toString()
    {
	return (string) $this->getUserid();
    }
}
