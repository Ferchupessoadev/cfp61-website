<?php

use App\Controllers\LoginController;
use Spyframe\lib\Route;
use Spyframe\lib\view;

// static routes.
Route::get('/', fn() => view::render('home'));
Route::get('/quienes-somos', fn() => view::render('quienes-somos'));
Route::get('/trayectos', fn() => view::render('trayectos'));
Route::get('/contacto', fn() => view::render('contacto'));

// Routes for login
Route::get('/login', fn() => (!$_SESSION) ? view::render('login') : Route::redirect('/admin'));
Route::get('/admin', fn() => (!$_SESSION) ? Route::redirect('/login') : view::render('admin'));
Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::start();
