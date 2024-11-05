<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
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

		session_start();

		session_regenerate_id(true);

		$this->setUserSession($user);

		$this->redirect('/admin');
	}

	/**
	 * @param array $user
	 * @return void
	 **/
	public function setUserSession(array $user): void
	{
		$_SESSION['username'] = $user['username'];
		$_SESSION['id'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['login'] = true;
	}

	public function logout(): void
	{
		session_start();
		if (!isset($_SESSION['login'])) {
			$this->redirect('/login');
		}
		endSession();
		$this->redirect('/login');
	}
}
