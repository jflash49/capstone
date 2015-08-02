<?php 
namespace Capstone\QuizBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
	$result =  $em->getRepository('SetupBundle:Question')->findQuestionA($type, $difficulty, $points, $question);
	}
	else
	{
	$result =  $em->getRepository('SetupBundle:Question')->findQuestionB($type, $difficulty, $points, $question);
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
	$obj->setParmeter('question_ID', $question['question_ID']);
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
    public function getAnswerAction (Request $request){
    
    return new Response("<p>Got the answer</p>");
	    
    }	
   /** 
    * This function stores the quiz ID, question ID and answer
    * 
    * @var integer $quiznum , 
    * 		integer $questionid,
    * 		string  $answer 
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
    public function endAction($response, array $quest){
      
	    return $this->render('QuizBundle::quiz.html.twig',array('end'=> $response, 'info'=>$quest));  
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
	    $questionobj= new Question();
	    $rsm = new ResultSetMapping();
	    $rsm->addScalarResult('quiznum', 'a');
	    $em= $this->getDoctrine()->getManager();
	    $quiznum = $em->getRepository('SetupBundle:Quiz')->findNextQuizNumber();	
	    $quest_type = array('visualization','classification','spatial','mathematical','logic','pattern recognition','verbal');
	    $qtype = array();
	    // for ($i = 0 ; $i <14; $i ++){
		  if((isset($quest_type))){
	      $type = array_rand($quest_type);
	      //$questionobj = $this->getAction($quest_type[$type],$quest, $points, $questioncnt);
	      $questionobj = $this->getAction('mathematical','l', '<3', $questioncnt);
	      
	      if (!$questionobj){
			  return $this->endAction("No Questions found");
		  }
		  else{
		  //var_dump($questionobj);
	      // array_push ($qtype,$type); 
	      // unset($quest_type[array_search($type,$quest_type)]);
	      
	      // $pass = $this->answerAction($quiznum[0]['a'], $questionobj);
	      if ($quest == 'm'&& $pass==false) {
		      $quest='l'; $points='<=2';
		      }
	      if ($quest == 'm'&& $pass==true ){
		      $quest='H'; $points='>3';
		      }
	      if ($quest == 'l'&& $pass==false){
		      $quest='l';$points='<=2';
		      }
	      if ($quest == 'l'&& $pass==true ){
		      $quest='m';$points = '=3';
	      }
	      if ($quest == 'h'&& $pass==false ){
		      $quest='m';$points = '=3';
		      }
	      if ($quest == 'h'&& $pass==true){
		      $quest='h';$points='>3';
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
    $questioninfo = explode ("::",$questionobj[0]);
    $output = array ('quiznum'=>$quiznum[0]['quiznum'], 'question'=>$questioninfo);
   return $this->endAction("Quiz complete", $output);
    }
    /**
     * This function is for calculating the IQ
     *
     *
     */
    public function IQAction($id){
      $em->getDoctrine()->getManager();
      $mean = $em->getRepository('SetupBundle:UserInfo')->findMean();

      $count = $em->getRepository('SetupBundle:UserInfo')->findCount();
      $std_dev = $em->getRepository('SetupBundle:UserInfo')->findStdDev->();
      
      $score = $em->getRrepository('SetupBundle:UserInfo')->getScore()//correct/num squestions;
      $zi = $score - $mean / $std_dev;
      IQunits = 100 + zi*15;
      
    
    }
    
}

