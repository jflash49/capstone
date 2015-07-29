<?php 
namespace Capstone\QuizBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Resquest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Capstone\SetupBundle\Entity\Question;
use Capstone\SetupBundle\Entity\QuizResults;
/**
 *Quiz Controller
 *
 *This class was generated 
 */
class QuizController extends Controller
{
   
    /**
    * This function will start the quiz selection process
    * return none
    * @Route("/start/",name="start_quiz")
    */ 
    public function startAction()
    {
	$this->selectorAction();
	return $this->endAction();
        //return $this->render('QuizBundle:Default:index.html.twig');
    }
    /**
     * This function selects the question from the database 
     * 
     * @var String type,
     * 		integer $difficulty,
     * 		string  $points,
     * 		array   $question
     * @return Question(Object)
     */ 
    public function getAction ($type, $difficulty, $points,array $question){
	$result = new Question ();
	$em= $this->getDoctrine()->getManager();
	
	$result =  $em->createQuery("Select A from SetupBundle:Question A 
		where A. difficulty = .'".$difficulty."' 
			AND A.points".$points.", 
			AND A.type=.'". $type."' 
			AND A.questionId NOT IN [".$question."]")->getResult();
	if (!$result){
		throw $this->createNotFoundException('Unable to find Question entity.');     
		}
	return $result;
	}

    /**
     * 
     * This function displays the question on the page then results upon completion
     * 
     * @return boolean $mark
     */ 
    public function answerAction($quiznum, $question){
	$mark = true;
	$this->render('QuizBundle::quiz.html.twig',array('question'=> $question['question']));
	if(isset($_POST['answer'])){
			$answer = $_POST['answer'];
			if ($answer!= $question['answer'])
				{
					$mark = false;				
				}
			//$this->storeAction($quiznum, $question['question_ID'], $answer,$mark);
			return $mark;
		}
		else {
			throw new \Exception ("No answer");
		}
    }
  /**
    * 
    * This method will get the answer if necessary...
    * 
    */ 
    public function getAnswerAction (){
	    
    }	
    /**
      * 
      * This function stores the quiz ID, question ID and answer
      * 
      * @var integer $quiznum , 
      * 		integer $questionid,
      * 		string  $answer
      * 
      * @return none
      */ 
    public function storeAction ($quiznum, $questionid, $answer,$mark) {
		$em = $this->getDoctrine()->getManager();
		
		    //insert into quizquestion values ($quiznum, $questionid, $answer)
		    
			//	insert into quizresults (quiznum)
			//if mark =true
			//	update quizresults 
			//		set correct_questions = correct_questions +1
			//where quiznum = quiznum
			//else
			//update quizresults 
			//		set incorrect_questions = incorrect_questions +1
			//where quiznum = quiznum
    }
   /**
    *  This function ends the current quiz
    * 
    */ 
    public function endAction(){
      
	    $response = "Quiz complete";
	    return $this->render('QuizBundle::quiz.html.twig',array('end'=> $response));
	    
      }

   /**
    * This function is for selecting the questions that will be used in the quiz
    * 
    * @return none
    */ 
    public function selectorAction(){
	    $questioncnt=array();
	    $pass = true;
	    $quest = 'M';
	    $points = '3';
	    $questionobj = new Question();
	    $em= $this->getDoctrine()->getManager();
	    $quiznum = $em->createQuery("select MAX(A.quiznum)+1  from SetupBundle:Quiz A")->getResult();
	    $quest_type = array('visualization','classification','spatial','mathematical','logic','pattern recognition','verbal');
	    $qtype = array();
	    
	    for ($i = 0 ; $i <14; $i ++){
		    if((isset($quest_type))){
			    $type = array_rand($quest_type);
			    
			    $questionobj = $this->getAction($type,$quest, $points, $questioncnt);
			    
			    array_push ($qtype,$type); 
			    unset($quest_type[array_search($type,$quest_type)]);
			    
			   // $pass = $this->answerAction($quiznum, $questionobj);
			    if ($quest == 'M'&& $pass==false) {
				    $quest='L'; $points='<=2';
				    }
			    if ($quest == 'M'&& $pass==true ){
				    $quest='H'; $points='>3';
				    }
			    if ($quest == 'L'&& $pass==false){
				    $quest='L';$points='<=2';
				    }
			    if ($quest == 'L'&& $pass==true ){
				    $quest='M';$points = '=3';
			    }
			    if ($quest == 'H'&& $pass==false ){
				    $quest='M';$points = '=3';
				    }
			    if ($quest == 'H'&& $pass==true){
				    $quest='H';$points='>3';
				    }
			    
			    array_push($questioncnt, $questionobj->getQuestionId());
		    }
		    else
			    {
				    foreach ($qtype as $q  ){
					    array_push($quest_type, $q);
				    }
			    }
    }
   
    }
    
}

