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


class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/user")
     */
    public function getUserAction (Request $request)
    {
		$values = [
			[
				'id' => 1,
				'username' => 'Jacob',
				'email' => 'jacobproulx@gmail.com',
			],
			[
				'id' => 2,
				'username' => 'Alex',
				'email' => 'alexlapointe@gmail.com',
			],
		];
		
		return $values;
	}
	
	/**
     * @Rest\Post("/user/")
     */
    public function postUserAction (Request $request)
    {
		return new View("User Added Successfully", Response::HTTP_OK);
	}
	
	
	/**
	 * @Route("/", name="emptyarray")
     * @Route("/{others}", name="emptyarray", requirements={"others"=".+"})
     */
    public function emptyarrayAction(Request $request, $others = null)
    {	
		return ['error' => '404'];
    }
}



































