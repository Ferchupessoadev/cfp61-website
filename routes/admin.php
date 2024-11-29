<?php

use App\Controllers\DashboardController;
use Spyframe\lib\Route;

Route::get(uri: '/admin', callback: [DashboardController::class, 'index']);
Route::get(uri: '/admin/multimedia', callback: [DashboardController::class, 'multimedia']);
Route::get(uri: '/admin/trayectos', callback: [DashboardController::class, 'trayectos']);
Route::get(uri: '/admin/users', callback: [DashboardController::class, 'users']);
Route::get(uri: '/admin/sample', callback: [DashboardController::class, 'sample']);
Route::get(uri: '/admin/preinscription', callback: [DashboardController::class, 'preinscription']);
