<?php

namespace App\Middlewares;

use Spyframe\lib\Route;

class LoginMiddleware extends Middleware
{

	/**
	 * method handle
	 * @return array
	 */
	public function handle(): array
	{
		if (!getSession('login')) {
			Route::redirect('/login');
		}

		$email = $this->request['email'];
		$password = $this->request['password'];

		if (empty($email) || empty($password)) {
			http_response_code(400);
			$data = [
				"success" => false,
				'message' => 'El email y la contaseña son obligatorios',
			];

			return $data;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			http_response_code(400);
			$data = [
				"success" => false,
				'message' => 'El email o contaseña incorrecta',
			];

			return $data;
		}

		return [
			"success" => true,
			"data" => [],
		];
	}
}
