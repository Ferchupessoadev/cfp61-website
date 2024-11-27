<?php

/**
 * No modify this file.
 * This file loads all routes
 */

use Spyframe\lib\Route;

// get all routes
$routesFolder = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__),
    RecursiveIteratorIterator::LEAVES_ONLY);

foreach ($routesFolder as $route) {
    if ($route->isFile() && $route->getExtension() == 'php' && $route->getFilename() != 'routes.php') {
        require_once $route->getRealPath();
    }
}

Route::start();
