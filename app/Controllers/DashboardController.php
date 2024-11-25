<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\CoursesModel;

class DashboardController extends Controller
{
    public function index(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        if (!$result['success']) {
            $ip = $_SERVER['REMOTE_ADDR'];
            return view('unauthorized', ['message' => 'que tamo haciendo, no estas autorizado para entrar aquí', 'ip' => $ip]);
        }

        return view('administrator.dashboard', ['logged' => $result, 'user' => [
            'name' => getSession('username'),
            'email' => getSession('email')
        ]]);
    }

    public function multimedia(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        if (!$result['success']) {
            $ip = $_SERVER['REMOTE_ADDR'];
            return view('unauthorized', ['message' => 'que tamo haciendo, no estas autorizado para entrar aquí', 'ip' => $ip]);
        }

        $directoryPath = __DIR__ . '/../../public_html/multimedia';

        $files = scandir($directoryPath);

        $files = array_diff($files, array('.', '..'));

        return view('administrator.multimedia', ['logged' => $result, 'user' => [
            'name' => getSession('username'),
            'email' => getSession('email'),
            'csrf_token' => getSession('csrf_token')
        ], 'files' => $files]);
    }

    public function trayectos(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        if (!$result['success']) {
            $ip = $_SERVER['REMOTE_ADDR'];
            return view('unauthorized', ['message' => 'que tamo haciendo, no estas autorizado para entrar Sharia', 'ip' => $ip]);
        }

        $coursesModel = new CoursesModel();

        $result = $coursesModel->all();

        return view('administrator.trayectos', ['logged' => $result, 'user' => [
            'name' => getSession('username'),
            'email' => getSession('email'),
        ],
            'courses' => $result]);
    }
}
