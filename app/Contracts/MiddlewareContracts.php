<?php

namespace App\Contracts;

use App\Middlewares\Middleware;

interface MiddlewareContracts
{
    public function setNext(Middleware $middleware): Middleware;

    /**
     * method handle
     * @return array{success: bool, message: string}
     */
    public function handle(): array;
}
