<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\CsrfMiddleware;

class MultimediaController extends Controller
{
    /**
     * Función para eliminar multimedia
     * @return array
     */
    public function deleteMultimedia(): array
    {
        // middlewares
        $authMiddleware = new AuthMiddleware();
        $csrfMiddleware = new CsrfMiddleware();
        $authMiddleware->setNext($csrfMiddleware);
        $response = $authMiddleware->handle();

        if (!$response['success'] && $response['message'] == 'You are not logged in') {
            http_response_code(401);
            return [
                'success' => false,
                'message' => 'No estás autorizado'
            ];
        }

        if (!$response['success'] && $response['message'] == 'CSRF token inválido') {
            http_response_code(400);
            return [
                'success' => false,
                'message' => $response['message']
            ];
        }

        $directoryPath = __DIR__ . '/../../public_html';

        $file = $_POST['file'];

        if (!file_exists($directoryPath . $file)) {
            http_response_code(400);

            return [
                'success' => false,
                'message' => 'El archivo no existe',
                'path' => $directoryPath . $file
            ];
        }

        if (!unlink($directoryPath . $file)) {
            http_response_code(400);

            return [
                'success' => false,
                'message' => 'Error al eliminar el archivo',
                'path' => $directoryPath . $file
            ];
        }

        return [
            'success' => true,
            'message' => 'El archivo se ha eliminado correctamente',
            'path' => $directoryPath . $file
        ];
    }

    /**
     * Función para subir multimedia
     * @return array
     */
    public function uploadMultimedia(): array
    {
        // middlewares
        $authMiddleware = new AuthMiddleware();
        $csrfMiddleware = new CsrfMiddleware();
        $authMiddleware->setNext($csrfMiddleware);
        $response = $authMiddleware->handle();

        if (!$response['success'] && $response['message'] == 'You are not logged in') {
            http_response_code(401);
            return [
                'success' => false,
                'message' => 'No estás autorizado'
            ];
        }

        if (!$response['success'] && $response['message'] == 'CSRF token inválido') {
            http_response_code(400);
            return [
                'success' => false,
                'message' => $response['message']
            ];
        }

        if (isset($_FILES['file']) && is_array($_FILES['file']['tmp_name'])) {
            $uploadedFiles = $_FILES['file'];
        } else {
            $uploadedFiles = [
                'tmp_name' => [$_FILES['file']['tmp_name']],
                'name' => [$_FILES['file']['name']],
                'size' => [$_FILES['file']['size']],
                'type' => [$_FILES['file']['type']]
            ];
        }

        $allowMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp'];

        $uploadResults = [];

        foreach ($uploadedFiles['tmp_name'] as $key => $tmpName) {
            $fileName = $uploadedFiles['name'][$key];
            $fileSize = $uploadedFiles['size'][$key];
            $fileType = $uploadedFiles['type'][$key];
            $uploadResult = [
                'file' => $fileName,
                'success' => false,
                'message' => '',
                'path' => '',
                'mimeTypes' => $fileType
            ];

            if (!in_array($fileType, $allowMimeTypes)) {
                $uploadResult['message'] = 'Formato de archivo no permitido';
                $uploadResults[] = $uploadResult;
                continue;
            }

            // max file size
            if ($fileSize > 5000000) {
                $uploadResult['message'] = 'Tamaño de archivo demasiado grande';
                $uploadResults[] = $uploadResult;
                continue;
            }

            $destination = __DIR__ . '/../../public_html/multimedia/' . $fileName;
            if (file_exists($destination)) {
                $fileName = time() . '-' . $fileName;
                $destination = __DIR__ . '/../../public_html/multimedia/' . $fileName;
            }

            if (move_uploaded_file($tmpName, $destination)) {
                $uploadResult['success'] = true;
                $uploadResult['message'] = 'Archivo subido correctamente';
                $uploadResult['path'] = '/multimedia/' . $fileName;
            } else {
                $uploadResult['message'] = 'Error al mover el archivo';
            }

            $uploadResults[] = $uploadResult;
        }

        return [
            'success' => true,
            'message' => 'Archivos procesados.',
            'files' => $uploadResults
        ];
    }
}
