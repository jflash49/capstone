<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizQuestion
 *@ORM\Table(name="Quiz", indexes={@ORM\Index(name="quiznum", 
columns={"quiznum"}), @ORM\Index(name="question_ID", columns={"question_ID"})})
 */
class QuizQuestion
{
     /**
     * @var integer
     */
     private $id;
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Capstone\SetupBundle\Entity\Quiz")
     * @ORM\JoinColumns ({ 
     * @ORM\JoinColumn (name="quiznum", referencedColumnName="quiznum"))
* })
     */
    private $quiznum;

    /**
     * @var integer
     * 
     *@ORM\ManyToOne(targetEntity="Capstone\SetupBundle\Entity\Question")
     * @ORM\JoinColumns ({ 
     * @ORM\JoinColumn (name="question_ID", 
     referencedColumnName="question_ID"))
	* })
     */
    private $questionID;

    /**
     * @var string
     */
    private $answer;


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
     * Set questionID
     *
     * @param integer $questionID
     * @return QuizQuestion
     */
    public function setQuestionID($questionID)
    {
        $this->questionID = $questionID;

        return $this;
    }

    /**
     * Get questionID
     *
     * @return integer 
     */
    public function getQuestionID()
    {
        return $this->questionID;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuizQuestion
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
