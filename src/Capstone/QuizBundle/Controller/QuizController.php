 <?php

namespace Capstone\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuizController extends Controller
{
	/**
	 * This function will start the quiz selection process
	 * 
	 */ 
    public function startAction()
    {
		questionselector();
        return $this->render('QuizBundle:Default:index.html.twig');
    }
    
    
    
    public function answerAction($quiznum, $question){
			$mark = true;
			echo $question['question'];
			if(isset($_POST['answer'])){
				$answer = $_POST['answer']
				storeanswer ($quiznum, $question['question_ID'], $answer);
				if $answer!= $question['answer']
					{
						$mark = false;
						return $mark;
					}
			return $mark;
			}
			
			public function getquestion ($type, $difficulty, $points,array $question){

	$result = select question from question where difficulty = $difficulty AND points.$points, and type= $type;
	$quest = select random question from $result where question not in $question;
}

public function questionanswer ($quiznum, $question){
			$mark = true;
			echo $question['question'];
			if(isset($_POST['answer'])){
				$answer = $_POST['answer']
				storeanswer ($quiznum, $question['question_ID'], $answer);
				if $answer!= $question['answer']
					{
						$mark = false;
						return $mark;
					}
			return $mark;
			}
			
/**
 * 
 * This function stores tthhe quiz ID, question ID and answer
 * 
 * @var integer $quiznum , 
 * 		integer $questionid,
 * 		string  $answer
 * 
 * @return none
 */ 
public function storeAction ($quiznum, $questionid, $answer) {

		insert into quizquestion values ($quiznum, $questionid, $answer)
		
}
/**
 *  This function ends the current quiz
 * 
 */ 
public function endquiz (){
 
	echo Quiz complete
 }

/**
 * This function is for selecting the questions that will be used in the quiz
 * 
 * @return none
 */ 
public function questionselector () {
	$questioncnt=array();
	$pass = true;
	$quest = 'M'
	$points = '3'
    $questionobj = new Question();
	//if $val = true;
		$quiznum = select is_null(max(quiznum),0)+1 quizNum from quiz.
		$quest_type = $array ('visualization','classification','spatial','mathematical','logic','pattern recognition','verbal');
		$qtype = $array();
		for (int $i = 0 ; $i <14; $i ++){
			if(!(isset($quest_type))){
				$type = array_rand($quest_type);
				
				$questionobj = getquestion($type,$quest, $points, $questioncnt);
				
				array_push ($qtype,$type); 
				unset($quest_type[array_search($type,$quest_type)]);
				
				$pass = questionanswer($quiznum, $questionobj);
				if (($quest == 'M'&& $pass==false) {
					$quest='L'; $points='<=2';
					}
				if ($quest == 'M'&& $pass==true ){
					$quest='H'; $points='>3';
					}
				if ($quest == 'L'&& $pass==false){
					$quest='L';$points='<=2';
					}
				if ($quest == 'L'&& $pass==true ){
					$quest='M';$points = '3'
				}
				if ($quest == 'H'&& $pass==false ){
					$quest='M';$points = '3'
					}
				if ($quest == 'H'&& $pass==true){
					$quest='H';$points='>3';
					}
				
				array_push($questioncnt, $questionobj['question_ID']);
			}
			else
				{
					foreach ($i in $qtype){
						array_push($quest_type, $i);
					}
				}
	}
	endquiz();
}
}
