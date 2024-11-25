<?php

namespace App\Middlewares;

class AuthMiddleware extends Middleware
{
    /**
     * method handle
     * validate if the user is logged
     * @param array $arguments
     * @return array
     */
    public function handle(array $arguments = []): array
    {
        startSession();
        if (!isset($_SESSION['login'])) {
            endSession();
            return [
                'success' => false,
                'message' => 'You are not logged in'
            ];
        }

        if ($this->next) {
            return $this->next->handle();
        }

        return [
            'success' => true,
            'message' => 'You are logged in'
        ];
    }
}
