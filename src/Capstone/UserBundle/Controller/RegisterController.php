<?php 
// src/Capstone/UserBundle/Controller/RegisterController.php
namespace Capstone\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Capstone\SetupBundle\Entity\User;
use Capstone\UserBundle\Form\RegisterFormType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @Template
     */ 
    public function registerAction(Request $request)
    {
        $defaultuser = new User();
        $defaultuser->setUsername('Leia');
        $providerKey='';
        $form = $this->createForm(new RegisterFormType(),$defaultuser);
          
        $form->handleRequest($request);
        if ($form->isValid()){
            $data = $form->getData();
            
            $defaultuser->setPassword(
                $this->encodePassword($defaultuser, $defaultuser->getPlainPassword())
                );

            $em = $this->getDoctrine()->getManager();
            $em->persist($defaultuser);
            $em->flush();
            
           
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Welcome to FunQ');
            
            $this->authenticateUser($defaultuser);
            $key = '_security.'.$providerKey.'.target_path';
            $session = $this->getRequest()->getSession();

             // get the URL to the last page, or fallback to the homepage
             if ($session->has($key)) {
                 $url = $session->get($key);
                 $session->remove($key);
             } else {
                 $url = $this->generateUrl('home');
            }//$url = $this->generateUrl('user');
            return $this->redirect($url);
        }
        return array('form' => $form->createView());
        // todo
    }
    
    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
    
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
    
    private function authenticateUser(User $user)
    {
        $providerKey = 'secured_area'; // your firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());
        $this->get('security.context')->setToken($token);
       
    }
} 
