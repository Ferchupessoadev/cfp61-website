<?php

namespace App\Middlewares;

class Middleware
{
	protected $request;
	protected $next;


	public function __construct()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method === 'POST') {
			if ($input = file_get_contents('php://input')) {
				$jsonData = json_decode($input, true);
				if (json_last_error() === JSON_ERROR_NONE) {
					$_POST = array_merge($_POST, $jsonData);
				}
			}
			$this->request = $_POST;
		} else {
			$this->request = $_GET;
		}
	}

	/**
	 * method setNext
	 * @param Middleware $next
	 * @return Middleware
	 **/
	public function setNext($next): Middleware
	{
		$this->next = $next;
		return $next;
	}

	public function handle() {}
}
