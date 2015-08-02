<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuizRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuizRepository extends EntityRepository
{


      public function findNextQuizNumber(){
      
      
	  return $this->getEntityManager()
            ->createQuery(
                'SELECT (Count(p)+1) AS quiznum FROM SetupBundle:Quiz p'
            
)
            ->getResult();
      }
} 
