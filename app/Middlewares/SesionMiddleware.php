<?php

namespace App\Middlewares;

use App\Models\ActiveSessions;

class SesionMiddleware
{
	public function handle(): bool
	{
		$activeSessions = new ActiveSessions();

		return true;
	}
}
