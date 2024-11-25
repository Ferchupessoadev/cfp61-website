<?php

namespace App\Middlewares;

class CsrfMiddleware extends Middleware
{
    public function handle(): array
    {
        $csrf_token = getSession('csrf_token');

        if ($this->request['csrf_token'] !== $csrf_token) {
            http_response_code(400);
            return [
                'success' => false,
                'message' => 'CSRF token inválido'
            ];
        }

        if ($this->next) {
            return $this->next->handle();
        }

        return [
            'success' => true,
            'message' => 'CSRF token válido'
        ];
    }
}
