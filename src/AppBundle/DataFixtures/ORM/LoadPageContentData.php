<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\Page;
use AppBundle\Entity\PageContent;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		$pageContents = [
			'Global' => [
				'navbar-title1'=>[
					'fr' => 'Qui je suis',
					'en' => 'Who I am'
				],
				'navbar-title2'=>[
					'fr' => 'Mes compétences',
					'en' => 'My skills'
				]
			],
			'Home' => [
				'title'=>[
					'fr' => 'Bienvenue sur mon portfolio!',
					'en' => 'Welcome on my portfolio!'
				],
				'subtitle'=>[
					'fr' => 'J\'espère qu\'il va vous plaire.',
					'en' => 'I hope it\'ll entertain you.'
				],
				'textes1'=>[
					'fr' => 'Sentez vous à laisse de naviguer sur le site pour découvrir mes réalisations ou pour me contacter.',
					'en' => 'Make yourself comfortable and do not hesitate to take a look at my collection or get in touch with me.'
				],
			],
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