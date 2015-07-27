<?php

namespace Capstone\SetupBundle\Entity;

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
     * @var string
     */
    private $answer;

    /**
     * @var \Capstone\SetupBundle\Entity\Quiz
     */
    private $quiznum;

    /**
     * @var \Capstone\SetupBundle\Entity\Question
     */
    private $questionID;


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

    /**
     * Set quiznum
     *
     * @param \Capstone\SetupBundle\Entity\Quiz $quiznum
     * @return QuizQuestion
     */
    public function setQuiznum(\Capstone\SetupBundle\Entity\Quiz $quiznum = null)
    {
        $this->quiznum = $quiznum;

        return $this;
    }

    /**
     * Get quiznum
     *
     * @return \Capstone\SetupBundle\Entity\Quiz 
     */
    public function getQuiznum()
    {
        return $this->quiznum;
    }

    /**
     * Set questionID
     *
     * @param \Capstone\SetupBundle\Entity\Question $questionID
     * @return QuizQuestion
     */
    public function setQuestionID(\Capstone\SetupBundle\Entity\Question $questionID = null)
    {
        $this->questionID = $questionID;

        return $this;
    }

    /**
     * Get questionID
     *
     * @return \Capstone\SetupBundle\Entity\Question 
     */
    public function getQuestionID()
    {
        return $this->questionID;
    }
}
