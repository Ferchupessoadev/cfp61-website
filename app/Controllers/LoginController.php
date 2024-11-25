<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\LoginMiddleware;
use App\Middlewares\MaxLengthMiddlewares;
use App\Models\ActiveSessions;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        if ($result['success']) {
            $this->redirect('/admin');
        }

        return view('login', ['logged' => false]);
    }

    /**
     * Login
     *
     * @return array
     */
    public function login(): array|string
    {
        // middlewares
        $authMiddleware = new AuthMiddleware();
        $maxLegthMiddleware = new MaxLengthMiddlewares([
            'email' => 255,
            'password' => 100
        ]);
        $loginMiddleware = new LoginMiddleware();
        $authMiddleware->setNext($maxLegthMiddleware)->setNext($loginMiddleware);
        $result = $authMiddleware->handle();

        // if the user is already logged in
        if ($result['success']) {
            if ($result['message'] === 'You are logged in') {
                $this->redirect('/admin');
            }

            return $result;
        }

        if (!$result['success'] && $result['message'] != 'You are not logged in') {
            http_response_code(400);
            return [
                'message' => $result['message'],
            ];
        }

        $email = $this->request['email'];
        $password = $this->request['password'];

        $userModel = new UserModel();
        $user = $userModel->login($email, $password);

        if (!$user['success']) {
            http_response_code(400);
            return [
                'message' => $user['message'],
            ];
        }

        // Set session and redirect
        startSession();
        session_regenerate_id(true);
        $this->setUserSession($user);
        // create a new active session in the database
        $ActiveSessions = new ActiveSessions();
        $ActiveSessions->insert([
            'session_id' => getSessionId(),
            'user_id' => $user['id'],
            'session_data' => serialize(sessions()),
            'last_activity' => time(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'is_active' => 1,
        ]);

        $this->redirect('/admin');
    }

    /**
     * @param array $user
     * @return void
     */
    private function setUserSession(array $user): void
    {
        setSession('username', $user['username']);
        setSession('id', $user['id']);
        setSession('email', $user['email']);
        setSession('login', true);
        setSession('csrf_token', csrf_token());
    }

    /**
     * Logout user
     * @return void
     */
    public function logout(): void
    {
        session_start();
        if (!getSession('login')) {
            $this->redirect('/login');
        }
        $activeSessions = new ActiveSessions();
        $activeSessions->deleteBySessionId();
        endSession();
        $this->redirect('/login');
    }

    public function resetPassword(): void {}
}
