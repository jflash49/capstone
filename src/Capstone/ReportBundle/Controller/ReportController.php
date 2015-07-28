<?php

namespace Capstone\ReportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Resquest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Report Controller
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReportController extends Controller
{
	/**
	 * @Route("/school/{school}",name="school_report")
	 * 
	 * @return FilterBySchool
	 */
	public function schoolAction($school) {
		
		/*$em = $this->getDoctrine()->getManager();
		$report = $em->getRepository('SetupBundle: UserInfo')->findAll($school);
		if (!$report){
			throw $this->createNotFoundException(
				'No School found for school '.$school
				);
			}*/
		
		return new Response ('<html><body>Hello</body></html>');
	}
	/**
	 * @Route("/region/{region}",name="region_report")
	 * 
	 */
	public function regionAction($region) {
		$em = $this->getDoctrine()->getManager();
		$report = $em->createQuery(
		"SELECT A.schoolId, A.school, B.parish from SetupBundle:School A JOIN SetupBundle:Parish B WHERE A.parish = B.parishId and B.parish='".$region." '")->getResult();
		if (!$report){
			throw $this->createNotFoundException(
				'No Data found for Region '.$region
				);
			}
	
		return $this->render('ReportBundle:Region:region.html.twig', array('region' => $report));
	}

} 
