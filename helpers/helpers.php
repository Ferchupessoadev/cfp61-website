<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

if (!function_exists('view')) {
	function view($view, $data = [])
	{
		$view = str_replace('.', '/', $view);
		$loader = new FilesystemLoader(__DIR__ . '/../resources/views');
		$twig = new Environment($loader);

		return $twig->render($view . '.twig', $data);
	}
}
