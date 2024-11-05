<?php

namespace App\Middlewares;

use Spyframe\lib\Route;

class AuthMiddleware extends Middleware
{

	/**
	 * method handle
	 * validate if the user is logged in and redirect if not to /login
	 * @return bool
	 */
	public function handle(): bool
	{
		session_start();
		if (!isset($_SESSION['login'])) {
			endSession();
			Route::redirect('/login');
			return false;
		}

		if ($this->next) {
			return $this->next->handle();
		}

		return true;
	}
}
