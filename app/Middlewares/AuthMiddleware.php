<?php

namespace App\Middlewares;

class AuthMiddleware extends Middleware
{

	/**
	 * method handle
	 * validate if the user is logged
	 * @return bool
	 */
	public function handle(): bool
	{
		startSession();
		if (!isset($_SESSION['login'])) {
			endSession();
			return false;
		}

		if ($this->next) {
			return $this->next->handle();
		}

		return true;
	}
}
