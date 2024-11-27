<?php

use App\Controllers\CoursesController;
use App\Controllers\MultimediaController;
use Spyframe\lib\Route;

Route::post(uri: '/api/multimedia/upload', callback: [MultimediaController::class, 'uploadMultimedia']);
Route::post(uri: '/api/multimedia/delete', callback: [MultimediaController::class, 'deleteMultimedia']);
Route::get(uri: '/api/courses/', callback: [CoursesController::class, 'getCourses']);
