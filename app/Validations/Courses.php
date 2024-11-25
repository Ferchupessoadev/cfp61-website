<?php

namespace App\Validations;

class Courses
{
    /**
     * courses validation
     * @param string $name
     * @param string $description
     * @param string $image
     * @param string $content
     * @return array
     */
    public static function validate(
        string $name = null,
        string $description = null,
        string $image = null,
        string $content = null
    ): array {
        $errors = [];

        if (empty($name)) {
            $errors[] = 'El nombre es requerido';
        }

        if (empty($description)) {
            $errors[] = 'La descripción es requerida';
        }

        if (empty($image)) {
            $errors[] = 'La imagen es requerida';
        }

        if (empty($content)) {
            $errors[] = 'La descripción es requerida';
        }


        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        return [
            'success' => true,
            'errors' => []
        ];
    }
}
