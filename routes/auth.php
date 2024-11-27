<?php

use App\Controllers\LoginController;
use Spyframe\lib\Route;

// Routes for login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
