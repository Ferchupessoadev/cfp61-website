<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;

class HomeController extends Controller
{
	/**
	 * method Index.
	 * principal page
	 * @return string
	 */
	public function index(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('home', ["logged" => $result]);
	}

	public function info(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('quienes-somos', ["logged" => $result]);
	}

	public function trayectos(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('trayectos', ["logged" => $result]);
	}

	public function contact(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('contacto', ["logged" => $result]);
	}
}
