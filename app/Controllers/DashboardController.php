<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use Spyframe\lib\Route;

class DashboardController extends Controller
{
	public function index(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		if (!$result) {
			Route::redirect('/login');
		}

		return view('administrator.dashboard', ["logged" => $result]);
	}
}
