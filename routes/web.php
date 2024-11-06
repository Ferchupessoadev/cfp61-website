<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Spyframe\lib\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/quienes-somos', [HomeController::class, 'info']);
Route::get('/trayectos', [HomeController::class, 'trayectos']);
Route::get('/contacto', [HomeController::class, 'contact']);

// Routes for login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Routes for admins
Route::get('/admin', [DashboardController::class, 'index']);

Route::start();
