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
			'apropos' => [
				'title'=>[
					'fr' => 'À propos de moi',
					'en' => 'About me'
				],
			],
			'projets' => [
				'title'=>[
					'fr' => 'Voici la liste des projets don je suis fière!',
					'en' => 'Here is my favorites projects that I\'ve done so far'
				],
			],
			'projet' => [
				'title'=>[
					'fr' => '...',
					'en' => '...'
				],
			],
			'joindre' => [
				'title'=>[
					'fr' => 'Pour me joindre, vous êtes à la bonne place!',
					'en' => 'To get in touch, you are on the right page!'
				],
				'subtitle'=>[
					'fr' => 'Si vous désirez obtenir plus d\'information ou pour simplement me laisser un commentaire, remplissez le formulaire ci-dessous.',
					'en' => 'If you\'d like to obtain more information or just leave me a comment, please fill the form below.'
				],
				'nom'=>[
					'fr' => 'Entrez votre nom',
					'en' => 'Enter your name'
				],
				'email'=>[
					'fr' => 'Entrez votre courriel',
					'en' => 'Enter your email'
				],
				'message'=>[
					'fr' => 'Entrez votre message',
					'en' => 'Enter your message'
				],
				'submit'=>[
					'fr' => 'Envoyer',
					'en' => 'Send'
				],
				'socials'=>[
					'fr' => 'Médias sociaux',
					'en' => 'socials medias'
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