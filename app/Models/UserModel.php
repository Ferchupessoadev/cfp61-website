<?php

namespace App\Models;


class UserModel extends Model
{
	public $table = 'users';

	/**
	 * function to check if user already exists
	 *
	 * @param string $email
	 * @param string $password
	 * 
	 * @return array
	 */
	public function login(string $email, string $password): array
	{
		$user = $this->prepare("SELECT * FROM $this->table WHERE email = ?", [$email])->first();

		if (!$user) {
			http_response_code(400);
			return [
				"message" => "Email o contraseña incorrectas",
				"success" => false,
			];
		}

		if (!password_verify($password, $user['password'])) {
			http_response_code(400);
			return [
				"message" => "Email o contraseña incorrectas",
				"success" => false,
			];
		}

		return [
			...$user,
			"success" => true,
		];
	}
}
