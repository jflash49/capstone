<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuizResultsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuizResultsRepository extends EntityRepository
{

    public function getScore($id)
    {
	return $this->getEntityManager()
	    ->createQuery("Select B.correct_question from SetupBundle:Quiz A JOIN SetupBundle:QuizResult B where A.quiznum =B.quiznum and A,UserID ='".$id."'")->getResult();
    }


}
