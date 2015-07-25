<?php

namespace Capstone\ReportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 *
 * @ORM\Table(name="UserInfo")
 * @ORM\Entity
 */
class UserInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $school;

    /**
     * @var string
     */
    private $class;

    /**
     * @var string
     */
    private $parish;

    /**
     * @var integer
     */
    private $iQ;
	
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
     * Set firstName
     *
     * @param string $firstName
     * @return UserInfo
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return UserInfo
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return UserInfo
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return UserInfo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set school
     *
     * @param string $school
     * @return UserInfo
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return UserInfo
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set parish
     *
     * @param string $parish
     * @return UserInfo
     */
    public function setParish($parish)
    {
        $this->parish = $parish;

        return $this;
    }

    /**
     * Get parish
     *
     * @return string 
     */
    public function getParish()
    {
        return $this->parish;
    }

    /**
     * Set iQ
     *
     * @param integer $iQ
     * @return UserInfo
     */
    public function setIQ($iQ)
    {
        $this->iQ = $iQ;

        return $this;
    }

    /**
     * Get iQ
     *
     * @return integer 
     */
    public function getIQ()
    {
        return $this->iQ;
    }
    /**
     * Set userid
     *
     * @param \Capstone\ReportBundle\Entity\User $userid
     * @return Quiz
     */
    public function setUserid(\Capstone\ReportBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Capstone\ReportBundle\Entity\User 
     */
    public function getUserid()
    {
        return $this->userid;
    }
    
}
