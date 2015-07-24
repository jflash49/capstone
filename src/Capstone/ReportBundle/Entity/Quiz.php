<?php

namespace Capstone\ReportBundle\Entity;

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
     * @ORM\Column(name="quizNum", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $quiznum;

    /**
     * @var \Capstone\ReportBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Capstone\ReportBundle\Entity\User")
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
