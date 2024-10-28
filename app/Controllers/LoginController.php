<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends Controller
{
    /**
     * Login
     *
     * @return array
     */
    public function index(): array
    {
        if (!empty($_SESSION)) {
            $this->redirect('/admin');
            return [];
        }

        $email = $this->request['email'];
        $password = $this->request['password'];

        if (empty($email) || empty($password)) {
            http_response_code(400);
            $data = [
                'message' => 'El email o contaseña son obligatorios',
            ];

            return $data;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            $data = [
                'message' => 'El email o contaseña incorrectas',
            ];

            return $data;
        }

        $userModel = new UserModel();
        $user = $userModel->login($email, $password);

        if (!$user['success']) {
            http_response_code(400);
            $data = [
                'message' => $user['message'],
            ];

            return $data;
        }

        session_regenerate_id(true);
        $_SESSION['username'] = $user['username'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['login'] = true;

        $this->redirect('/admin');
    }

    public function logout(): void
    {
        session_destroy();
        session_unset();
        $this->redirect('/login');
    }
}
