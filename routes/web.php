<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MultimediaController;
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
Route::get('/admin/multimedia', [DashboardController::class, 'multimedia']);
Route::get('/admin/trayectos', [DashboardController::class, 'trayectos']);
Route::post('/api/multimedia/upload', [MultimediaController::class, 'uploadMultimedia']);
Route::post('/api/multimedia/delete', [MultimediaController::class, 'deleteMultimedia']);
// Route::get('/api/users/', [DashboardController::class, 'getUsers']);
// Route::get('/api/courses/', [DashboardController::class, 'getCourses']);
// Route::post('/api/courses/', [DashboardController::class, 'setCourse']);

// Mail
Route::post('/mail', [HomeController::class, 'mail']);

Route::start();
