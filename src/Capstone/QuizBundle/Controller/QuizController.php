<?php 
namespace Capstone\QuizBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Resquest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\ORM\Query\ResultSetMapping;
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
	return $this->selectorAction();
	
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
	if(!empty($question)){
	//$list = implode(',',$question);
	$result =  $em->createQuery("Select A from SetupBundle:Question A 
		where A.difficulty = '".$difficulty."' 
			AND A.points".$points."
			AND A.questionType='". $type."' 
			AND A.questionId NOT IN (".$question.")")->getResult();
	}else{
		$result =  $em->createQuery("Select A from SetupBundle:Question A 
		where A.difficulty = '".$difficulty."' 
			AND A.points".$points."
			AND A.questionType='". $type."'")->getResult();
	}
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
	$obj = new QuizQuestion();
	$obj->setParameter('quiznum', $quiznum);
	$form = $this->createForm(new QuizQuestionType(), $obj);
	$form->handleRequest($request);	
	/*if($form->isValid()){
		$em= $this->getDoctrine()->getManager();
		$em->persist($obj);*/
			$answer = $_POST['answer'];
			if ($answer!= $question['answer'])
				{
					$mark = false;				
				}
			//$this->storeAction($quiznum, $question['question_ID'], $answer,$mark);
			return $mark;
		//}
		//else {
		//	throw new \Exception ("No answer");
		//}
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
		$result = new QuizResult();
		$result = setQuiznum($quiznum);
		$em = $this->getDoctrine()->getManager();
		
		    //insert into quizquestion values ($quiznum, $questionid, $answer)
		    
			//	insert into quizresults (quiznum)
			//if mark =true
			//	update quizresults 
			//$result = setQuiznum($quiznum);correct_questions = correct_questions +1
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
    public function endAction($response){
      
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
	    $points = '=3';
	    $questionobj = new Question();
	    $rsm = new ResultSetMapping();
		$rsm->addScalarResult('quiznum', 'a');
	    $em= $this->getDoctrine()->getManager();
	    $quiznum = $em->createNativeQuery("select COUNT(A.quiznum)+1 AS 'quiznum'  from Quiz A",$rsm)->getResult();
	   // $questionobj= $em->createQuery("select A  from SetupBundle:Question A")->getResult();
	    //var_dump($questionobj);die;
	    $quest_type = array('visualization','classification','spatial','mathematical','logic','pattern recognition','verbal');
	    $qtype = array();
	   // for ($i = 0 ; $i <14; $i ++){
		    if((isset($quest_type))){
			    $type = array_rand($quest_type);
			    $questionobj = $this->getAction($quest_type[$type],$quest, $points, $questioncnt);
			    //$questionobj = $this->getAction('classification','l', '<3', $questioncnt);
			    //var_dump($questionobj);die;
			    if (!$questionobj){
					return $this->endAction("No Questions found");
				}
				else{
				//var_dump($questionobj);
			   // array_push ($qtype,$type); 
			   // unset($quest_type[array_search($type,$quest_type)]);
			    
			   // $pass = $this->answerAction($quiznum[0]['a'], $questionobj);
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
			    
			    //array_push($questioncnt, $questionobj->getQuestionId());
		 //   }
		////    else
		//	    {
		//		    foreach ($qtype as $q  ){
					//    array_push($quest_type, $q);
		//		    }
			    }
    }
   return $this->endAction("Quiz complete");
    }
    
}

