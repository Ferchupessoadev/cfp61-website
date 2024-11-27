<?php

use App\Controllers\CoursesController;
use App\Controllers\HomeController;
use Spyframe\lib\Route;

Route::get(uri: '/', callback: [HomeController::class, 'index']);
Route::get(uri: '/quienes-somos', callback: [HomeController::class, 'info']);
Route::get(uri: '/trayectos', callback: [HomeController::class, 'trayectos']);
Route::get(uri: '/contacto', callback: [HomeController::class, 'contact']);
Route::get(uri: '/preinscripcion', callback: [HomeController::class, 'preinscription']);
Route::get(uri: '/trayectos/{name}', callback: [CoursesController::class, 'index']);

Route::post(uri: '/mail', callback: [HomeController::class, 'mail']);
