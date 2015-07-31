<?php

namespace Capstone\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Capstone\FileBundle\Entity\Document;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UploadController extends Controller {  
    /**
     *
     *
     */     
    public function uploadAction(Request $request)
    {
	$document = new Document();
	$form = $this->createFormBuilder($document)
	    ->add('name')
	    ->add('file')
	    ->getForm();

	$form->handleRequest($request);

	if ($form->isValid()) {
	    $em = $this->getDoctrine()->getManager();

	    $em->persist($document);
	    $em->flush();

	    return $this->redirectToRoute('home');
	}

	return array('form' => $form->createView());
	}
	// ...
    
 /*   public function uploadAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $image = $request->files->get('img');
            $status = 'success';
            $uploadedURL='';
            $message='';
            if (($image instanceof UploadedFile) && ($image->getError() == '0')) {
                if (($image->getSize() < 2000000000)) {
                    $originalName = $image->getClientOriginalName();
                    $name_array = explode('.', $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'png');
                    if (in_array(strtolower($file_type), $valid_filetypes)) {
                        //Start Uploading File
                        
                      $document = new Document();
                      $document->setFile($image);
                      $document->setSubDirectory('uploads');
                      $document->processFile();
                      $uploadedURL=$uploadedURL = $document->getUploadDirectory() . DIRECTORY_SEPARATOR . $document->getSubDirectory() . DIRECTORY_SEPARATOR . $image->getBasename();
                    } else {
                        $status = 'failed';
                        $message = 'Invalid File Type';
                    }
                } else {
                    $status = 'failed';
                    $message = 'Size exceeds limit';
                }
            } else {
                $status = 'failed';
                $message = 'File Error';
            }
            return $this->render('FileBundle:Default:index.html.twig',array('status'=>$status,'message'=>$message,'uploadedURL'=>$uploadedURL));
        } else {
            return $this->render('FileBundle:Default:index.html.twig');
        }
    }*/

}

?>
