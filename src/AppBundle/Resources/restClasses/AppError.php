<?php

namespace AppBundle\Resources\restClasses;

class AppError
{
	private $message;
	
	//Class functions
	
	public function __construct ($message)
	{		
		$this->message = $message;
	}
	
	public function setMessage ($message)
	{
		$this->message = $message;
	}
	
	public function getError ()
	{
		$message = (!empty($this->message))? array('message' => $this->message) : '';
		
		return [
			$message
		];
	}
}