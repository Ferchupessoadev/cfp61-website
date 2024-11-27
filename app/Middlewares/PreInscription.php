<?php

namespace App\Middlewares;

use App\Models\PreInscriptionModel;

class PreInscription extends Middleware
{
    public function handle(): array
    {
        $preInscriptionModel = new PreInscriptionModel();
        $sql = 'SELECT * FROM preinscription';
        $result = $preInscriptionModel->prepare($sql)->first();

        if (!$result['status']) {
            return [
                'success' => false,
                'message' => 'La preinscripcion no esta disponible'
            ];
        }

        return ['success' => true, 'message' => 'Las inscripciones estan abiertas!!!'];
    }
}
