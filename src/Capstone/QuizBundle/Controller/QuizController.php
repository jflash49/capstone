 <?php

namespace Capstone\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuizController extends Controller
{
    public function indexAction()
    {
        return $this->render('QuizBundle:Default:index.html.twig');
    }
}