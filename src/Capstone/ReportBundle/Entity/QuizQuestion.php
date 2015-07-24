<?php

namespace Capstone\ReportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizQuestion
 */
class QuizQuestion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
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
