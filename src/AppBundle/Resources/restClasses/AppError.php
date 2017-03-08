<?php

namespace AppBundle\Resources\restClasses;

class AppError
{
	private $message;
	private $code;
	
	//Class functions
	
	public function __construct ($message, $code='')
	{		
		$this->message = $message;
		$this->code = $code;
	}
	
	public function setMessage ($message)
	{
		$this->message = $message;
	}
	
	public function getError ()
	{
		$errorFormated = array();
		
		if(!empty($this->message))
		{
			$errorFormated['message'] = $this->message;
		}
		if(!empty($this->code))
		{
			$errorFormated['code'] = $this->code;
		}
		
		return $errorFormated;
	}
}