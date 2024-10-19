<?php

namespace App\Controllers;

use App\Models\UserModel;


class LoginController extends Controller
{
	public function index(): array
	{
		$email = $this->request['email'];
		$password = $this->request['password'];

		if (empty($email) || empty($password)) {
			http_response_code(400);
			$data = [
				"message" => "El email o contaseña son obligatorios",
			];

			return $data;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			http_response_code(400);
			$data = [
				"message" => "El email o contaseña incorrectas",
			];

			return $data;
		}

		$User = new UserModel();
		$UserExists = $User->alreadyExists($email, $password);

		if ($UserExists['alreadyExists'] === false) {
			return [
				"message" => $UserExists['message'],
				"status" => $UserExists['alreadyExists'],
			];
		}

		session_regenerate_id(true);
		$_SESSION['sesion'] = true;
		$_SESSION['username'] = $UserExists['username'];
		$_SESSION['email'] = $email;

		$this->redirect('/');
	}

	public function logout(): void
	{
		session_destroy();
		session_unset();
		$this->redirect('/login');
	}
}
