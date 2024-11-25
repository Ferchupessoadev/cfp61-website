<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

if (!function_exists('view')) {
	function view($view, $data = [])
	{
		$view = str_replace('.', '/', $view);
		$loader = new FilesystemLoader(__DIR__ . '/../resources/views');
		$twig = new Environment($loader);

		return $twig->render($view . '.twig', $data);
	}
}

if (!function_exists('csrf_token')) {
	function csrf_token()
	{
		return bin2hex(random_bytes(32));
	}
}
