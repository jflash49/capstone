<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="Quiz", indexes={@ORM\Index(name="UserID", columns={"UserID"})})
 * @ORM\Entity
 */
class Quiz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quiznum", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $quiznum;

    /**
     * @var \Capstone\SetupBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Capstone\SetupBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserID", referencedColumnName="UserID")
     * })
     */
    private $userid;



    /**
     * Get quiznum
     *
     * @return integer 
     */
    public function getQuiznum()
    {
        return $this->quiznum;
    }

    /**
     * Set userid
     *
     * @param \Capstone\SetupBundle\Entity\User $userid
     * @return Quiz
     */
    public function setUserid(\Capstone\SetupBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Capstone\SetupBundle\Entity\User 
     */
    public function getUserid()
    {
        return $this->userid;
    }
   /**
    *
    *@return String
    */
    public function __toString()
    {
	  return (string)$this->getQuiznum();
    }
}
