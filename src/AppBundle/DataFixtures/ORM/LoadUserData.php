<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('jacopproulx@gmail.com');
        $userAdmin->setPlainPassword('123');
		$userAdmin->setSuperAdmin(true);
		$userAdmin->setEnabled(true);
		
        $manager->persist($userAdmin);
        $manager->flush();
    }
}