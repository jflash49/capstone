<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Serializable;
/**
 * User
 * @ORM\Table(name='User')
 * @ORM\Entity(repositoryClass="Capstone\UserBundle\Entity\UserRepository")
 */
class User implements AdvancedUserInterface, Serializable
{
    /**
     * @var integer
     */
    private $userid;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
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
	// blank for now
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
        $this->id,
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
        $this->id,
        $this->username,
        $this->password,
    ) = unserialize($serialized);
    }
}
