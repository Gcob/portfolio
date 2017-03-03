<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\Page;
use AppBundle\Entity\PageContent;

class PageUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		$pageContents = [
			'Home' => [
				'title'=>[
					'fr' => 'Bienvenue sur mon portfolio!',
					'en' => 'Welcome on my portfolio!'
				],
				'subtitle'=>[
					'fr' => 'J\'espère qu\'il va vous plaire.',
					'en' => 'I hope it\'ll entertain you.'
				]
			]
		];
		
		foreach($pageContents as $pagename => $varnames)
		{
			$pageObj = new Page();
			$pageObj->setPagename($pagename);
			
			foreach($varnames as $varname => $locales)
			{
				foreach($locales as $locale => $content)
				{
					$contentobj = new PageContent();
					$contentobj
						->setPage($pageObj)
						->setVarname($varname)
						->setLocale($locale)
						->setContent($content)
					;
					$manager->persist($contentobj);
				}
			}
			
			$manager->persist($pageObj);
			$manager->flush();
		}
    }
}


















