<?php

namespace App\Middlewares;

use App\Contracts\MiddlewareContracts;

abstract class Middleware implements MiddlewareContracts
{
    protected $request;
    protected $arguments;
    protected $next;

    /**
     * method __construct
     * @param array $arguments
     */
    public function __construct(array $arguments = [])
    {
        $this->arguments = $arguments;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            if ($input = file_get_contents('php://input')) {
                $jsonData = json_decode($input, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $_POST = array_merge($_POST, $jsonData);
                }
            }
            $this->request = $_POST;
        } else {
            $this->request = $_GET;
        }
    }

    public function handle(): array
    {
        return $this->next->handle($this->request);
    }

    /**
     * method setNext
     * @param Middleware $next
     * @param array $arguments
     * @return Middleware
     */
    public function setNext(Middleware $next): Middleware
    {
        $this->next = $next;
        return $next;
    }
}
