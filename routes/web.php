<?php

use App\Controllers\LoginController;
use Spyframe\lib\Route;
use Spyframe\lib\view;

Route::get('/', fn() => view::render('home'));

Route::get('/login', fn() => view::render('login'));

Route::post('/login', [LoginController::class, 'index']);

Route::get('/logout', [LoginController::class, 'logout']);


Route::start();
