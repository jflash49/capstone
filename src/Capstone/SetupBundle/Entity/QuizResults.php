<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizResults
 */
class QuizResults
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $correctQuestions;

    /**
     * @var integer
     */
    private $incorrectQuestions;
	/**
     * @var integer
     * @ORM\OneToOne (targetEntity="Capstone/SetupBundle/Entity/Quiz")
     *
     */
    private $quiznum;

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
     * Set correctQuestions
     *
     * @param integer $correctQuestions
     * @return QuizResults
     */
    public function setCorrectQuestions($correctQuestions)
    {
        $this->correctQuestions = $correctQuestions;

        return $this;
    }

    /**
     * Get correctQuestions
     *
     * @return integer 
     */
    public function getCorrectQuestions()
    {
        return $this->correctQuestions;
    }

    /**
     * Set incorrectQuestions
     *
     * @param integer $incorrectQuestions
     * @return QuizResults
     */
    public function setIncorrectQuestions($incorrectQuestions)
    {
        $this->incorrectQuestions = $incorrectQuestions;

        return $this;
    }

    /**
     * Get incorrectQuestions
     *
     * @return integer 
     */
    public function getIncorrectQuestions()
    {
        return $this->incorrectQuestions;
    }
}
