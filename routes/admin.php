<?php

use App\Controllers\DashboardController;
use Spyframe\lib\Route;

Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/admin/multimedia', [DashboardController::class, 'multimedia']);
Route::get('/admin/trayectos', [DashboardController::class, 'trayectos']);
