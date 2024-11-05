<?php

use App\Controllers\LoginController;
use App\Middlewares\AuthMiddleware;
use Spyframe\lib\Route;
use Spyframe\lib\view;

// static routes.
Route::get('/', fn() => view::render('home'));
Route::get('/quienes-somos', fn() => view::render('quienes-somos'));
Route::get('/trayectos', fn() => view::render('trayectos'));
Route::get('/contacto', fn() => view::render('contacto'));

// Routes for login
Route::get('/login', fn() => (!isset($_SESSION['login'])) ? view::render('login') : Route::redirect('/admin'));
Route::get('/admin', function () {
	$authMiddleware = new AuthMiddleware();
	$authMiddleware->handle();

	return view::render('administrator.dashboard');
});

Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::start();
