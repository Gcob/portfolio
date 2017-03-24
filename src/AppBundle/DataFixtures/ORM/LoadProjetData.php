<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Projet;

class LoadProjetData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		$projetsContents = array(
			array(
				"url" => 'http://pafq.ca',
				"image" => 'pafq.jpg',
				"title" => 'Placement Auto Formation Québec',
				"title_en" => 'Placement Auto Formation Quebec',
				"description" => 'Site que j\'ai fait pour un ami qui voulait donner des cours en ventes automobiles.',
				"description_en" => 'website I\'ve done for my friend who\'s teaching how to sale cars.',
			),
			array(
				"url" => 'http://airs-sira.ca/',
				"image" => 'airs.jpg',
				"title" => 'Assistance en intégration et réintégration sociale',
				"title_en" => 'Social intergration and reintegration Assistance',
				"description" => '
					SIRA est un agent de changement social visans à créer une société multiculturelle qui facilite un mode de vie social sain parmi les jeunes et adultes, ainsi que le développement durable. Nous fournissons des informations et des services adaptés aux individus, pour qu’ils puissent s’intégrer en société canadienne.
				',
				"description_en" => '
					SIRA is an agent of a social change. We aim to create a multicultural society which facilitates a pro-social lifestyle for adults and youths. To achieve this, we deliver information and services adapted to individuals as they become integrated into Canadian society.
				',
			),
			array(
				"url" => 'https://abl-networksolutions.com/',
				"image" => 'abl.jpg',
				"title" => 'ABL-Network Solutions, Inc',
				"title_en" => 'ABL-Network Solutions, Inc',
				"description" => '
					Télécommunications, Câbles de fibre optique, Câblage de réseau, Caméras de sécurité
				',
				"description_en" => '
					Telecommunications services, Fiber Optic cable Installations, Network cabling, Security cameras.
				',
			),
			array(
				"url" => 'http://tactikal1426.com/',
				"image" => 'tactikal.jpg',
				"title" => 'Entraînement physique Tactikal 1426',
				"title_en" => 'Entraînement physique Tactikal 1426',
				"description" => '
					Le Tactikal 1426 amène une toute nouvelle ambiance d’entraînement qui vous apportera discipline, force et endurance. Psychologiquement et physiquement, notre centre d’entraînement vous fera atteindre d’autres niveaux en vous permettant de vous dépasser et de constamment pousser vos limites.
				',
				"description_en" => '
					The Tactikal 1426 brings a whole new training atmosphere that will bring you discipline, strength and endurance. Psychologically and physically, our training center allows you to reach other levels by allowing you to overtake and constantly push your limits.
				',
			),
			
		);
		
		foreach($projetsContents as $projetContent)
		{
			$projetObj = new Projet();
			$projetObj->setUrl($projetContent['url']);
			$projetObj->setImage($projetContent['image']);
			$projetObj->setTitle($projetContent['title']);
			$projetObj->setTitleEn($projetContent['title_en']);
			$projetObj->setDescription($projetContent['description']);
			$projetObj->setDescriptionEn($projetContent['description_en']);
			
			$manager->persist($projetObj);
		}
		
		$manager->flush();
    }
}




















