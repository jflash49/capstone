<?php
// src/Capstone/UserBundle/DataFixtures/ORM/LoadUsers.php
namespace Capstone\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Capstone\SetupBundle\Entity\User;


use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
    private $container;
    
    public function load(ObjectManager $manager)
    {
      $user = new User();
      $user->setUsername('darth');
      // todo - fill in this encoded password... ya know... somehow...
      $user->setPassword($this->encodePassword($user, 'darthpass'));
      $manager->persist($user);

      // the queries aren't done until now
      $manager->flush();o
    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    private function encodePassword(User $user, $plainPassword)
{
    $encoder = $this->container->get('security.encoder_factory')
        ->getEncoder($user)
    ;

    return $encoder->encodePassword($plainPassword, $user->getSalt());
}

}

