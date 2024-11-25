<?php

namespace App\Middlewares;

class MaxLengthMiddlewares extends Middleware
{
    /**
     * RulesMiddlewares
     * example:
     * ```php
     * $MaxLengthMiddlewares = new MaxLengthMiddlewares([
     *     'email' => 255,
     *     'password' => 64
     * ])
     * ```
     * @param array $arguments
     * @return array
     */
    public function handle(): array
    {
        foreach ($this->arguments as $field => $maxLength) {
            if (isset($this->request[$field]) && strlen($this->request[$field]) > $maxLength) {
                return [
                    'success' => false,
                    'message' => 'El campo ' . $field . ' es demasiado largo'
                ];
            }
        }

        if ($this->next) {
            return $this->next->handle();
        }

        return [
            'success' => true,
            'message' => 'OK'
        ];
    }
}
