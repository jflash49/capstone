<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="Question", indexes={@ORM\Index(name="question_type", columns={"question_type"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="question_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=true)
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulty", type="string", length=1, nullable=true)
     */
    private $difficulty;

    /**
     * @var integer
     *
     * @ORM\Column(name="linked_questions", type="integer", nullable=true)
     */
    private $linkedQuestions;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="blob", nullable=true)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=1, nullable=true)
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="most_correct_answer", type="string", length=1, nullable=true)
     */
    private $mostCorrectAnswer;

    /**
     * @var \Capstone\SetupBundle\Entity\Questiontype
     *
     * @ORM\ManyToOne(targetEntity="Capstone\SetupBundle\Entity\Questiontype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_type", referencedColumnName="question_type")
     * })
     */
    protected $questionType;



    /**
     * Get questionId
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Question
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set difficulty
     *
     * @param string $difficulty
     * @return Question
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return string 
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set linkedQuestions
     *
     * @param integer $linkedQuestions
     * @return Question
     */
    public function setLinkedQuestions($linkedQuestions)
    {
        $this->linkedQuestions = $linkedQuestions;

        return $this;
    }

    /**
     * Get linkedQuestions
     *
     * @return integer 
     */
    public function getLinkedQuestions()
    {
        return $this->linkedQuestions;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Question
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
     * Set mostCorrectAnswer
     *
     * @param string $mostCorrectAnswer
     * @return Question
     */
    public function setMostCorrectAnswer($mostCorrectAnswer)
    {
        $this->mostCorrectAnswer = $mostCorrectAnswer;

        return $this;
    }

    /**
     * Get mostCorrectAnswer
     *
     * @return string 
     */
    public function getMostCorrectAnswer()
    {
        return $this->mostCorrectAnswer;
    }

    /**
     * Set questionType
     *
     * @param \Capstone\SetupBundle\Entity\Questiontype $questionType
     * @return Question
     */
    public function setQuestionType(\Capstone\SetupBundle\Entity\Questiontype $questionType = null)
    {
        $this->questionType = $questionType;

        return $this;
    }

    /**
     * Get questionType
     *
     * @return \Capstone\SetupBundle\Entity\Questiontype 
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }
    
   /**
    * To String Function
    *
    * @return string
    */
    public function __toString()
    {
	    return (string) $this->getQuestionType();
    }
    
    
}
