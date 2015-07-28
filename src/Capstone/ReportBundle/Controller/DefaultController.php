<?php

namespace Capstone\ReportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ReportBundle:Default:index.html.twig');
    }
    
    public function studentAction ()
    {
	
    //return->render (ReportBundle:Default:index.html.twig, array (, ))
    
    }
}
