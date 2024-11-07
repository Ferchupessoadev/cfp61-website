<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\LoginMiddleware;
use App\Models\UserModel;

class LoginController extends Controller
{

	public function index(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		if ($result) {
			$this->redirect('/admin');
		}

		return view('login', ["logged" => false]);
	}

	/**
	 * Login
	 * 
	 * @return array
	 */
	public function login(): array
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		if ($result) {
			$this->redirect('/admin');
		}

		$email = $this->request['email'];
		$password = $this->request['password'];

		// Login middleware. Validate email and password.
		$LoginMiddleware = new LoginMiddleware();
		$response = $LoginMiddleware->handle();

		if (!$response['success'])
			return $response["message"];

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
		$this->redirect('/admin');
	}

	/**
	 * @param array $user
	 * @return void
	 **/
	private function setUserSession(array $user): void
	{
		setSession('username', $user['username']);
		setSession('id', $user['id']);
		setSession('email', $user['email']);
		setSession('login', true);
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
		endSession();
		$this->redirect('/login');
	}
}
