<?php

namespace AppBundle\Resources\restClasses;

//use Symfony\Component\HttpKernel\Exception\HttpException;

use AppBundle\Resources\restClasses\AppError;

class AppResponse
{
	private $data;
	private $appError;
	
	//Class functions
	
	public function __construct ($data, AppError $appError = null)
	{				
		$this->data = $data;
		$this->appError = ($appError)?$appError:new AppError('');
	}
	
	public function getResponse ()
	{
		if(!empty($this->data) && gettype($this->data) !== 'array')
		{
			throw new \Exception ('Please provide an array to store your data. "'.gettype($this->data).'" provided.');
		}
		
		return [
			'data' => $this->data,
			'app_error' => $this->appError->getError(),
		];
	}
	
}











