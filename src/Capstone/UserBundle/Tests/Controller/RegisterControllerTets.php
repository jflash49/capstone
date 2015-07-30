 
<?php

namespace Capstone\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException ;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();
        
        $container = self::$kernel->getContainer();
        $em = $container->get('doctrine');
        $userRepo = $em->getRepository('SetupBundle:User');
        $userRepo->createQueryBuilder('u')
            ->delete()
            ->getQuery()
            ->execute()
        ;
        $crawler = $client->request('GET', '/register');
        $response = $client->getResponse();
    
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Register', $response->getContent());
        $usernameVal = $crawler
        ->filter('#user_register_username')
        ->attr('value')
    ;
        $this->assertEquals('Leia', $usernameVal);
          the name of our button is "Register!"
        $form = $crawler->selectButton('Register!')->form();
        $form['user_register[username]'] = 'user5';
        $form['user_register[email]'] = 'user5@user.com';
        $form['user_register[plainPassword][first]'] = 'P3ssword';
        $form['user_register[plainPassword][second]'] = 'P3ssword';
        $crawler = $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertRegexp(
            '/This value should not be blank/',
            $client->getResponse()->getContent()
        );
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertContains(
            'Register',
            $client->getResponse()->getContent()
        );

        
    }
}
