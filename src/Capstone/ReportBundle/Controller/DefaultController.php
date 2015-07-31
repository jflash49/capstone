<?php

namespace Capstone\ReportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ReportBundle:Default:index.html.twig');
    }
    /**
     * @Route("/MOE/{info}/",name="MOE_report")
     * @return Pdf Page
     */
    public function pdfAction ($info){
	
   return $this->render ('ReportBundle::moe.html.twig', array('info' => $info ));
    /*return $this->get('knp_snappy.pdf')->generateFromHtml($this->renderView( 'ReportBundle::moe.html.twig',array('info' => $info)), '/home/demoy/Downloads/test1template.pdf');*/
    }
}

