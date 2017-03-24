<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use AppBundle\Resources\restClasses\AppResponse;
use AppBundle\Resources\restClasses\AppError;


class DefaultController extends FOSRestController
{
	
	/**
	 * @Rest\Get(
	 * 	"/page-content/{_locale}/{pagename}", 
	 * 	requirements={
	 * 	 "_locale": "en|fr"
	 * 	}
	 * )
	 */

    public function getPageContentByLangAndPageNameAction (Request $request, $_locale, $pagename)
    {
		header('Access-Control-Allow-Origin: *');//lol, what a glitch
		
		$appError = new AppError('');
		$data = array();
		
		$page = $this->getDoctrine()
			->getRepository('AppBundle:Page')
			->findOneBy(array('pagename' => $pagename))
		;
		
		if($page)
		{
			//Il reste a trouve le moyen (avec les query builder) de retourner les contenu sams leurs locals ni leurs pages (car c'est redondant pour rien)
			$contents = $this->getDoctrine()
				->getRepository('AppBundle:PageContent')
				->findBy(array('page' => $page, 'locale' => $_locale))
			;
			
			foreach($contents as $content)
			{
				$data[$content->getVarname()] = $content->getContent();
			}
			
		}
		else
		{
			$appError->setMessage('Page '.$pagename.' not found');
		}
		return $data;
	}
	
	
	/**
	 * @Route("/", name="emptyarray")
     * @Route("/{others}", name="emptyarray", requirements={"others"=".+"})
     */
    public function emptyarrayAction(Request $request, $others = null)
    {	
		header('Access-Control-Allow-Origin: *');//lol, what a glitch
		
		$appError = new AppError('Route not found', 404);
		$data = array();
		$appResponse = new AppResponse($data, $appError);
		
		return $appResponse->getResponse();
    }
}



































