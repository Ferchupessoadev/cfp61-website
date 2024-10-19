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
	public function alreadyExists(string $email, string $password): array
	{
		$user = $this->prepare("SELECT * FROM $this->table WHERE email = ? LIMIT 1", [$email])->get();

		if (count($user) === 0) {
			http_response_code(400);
			return [
				"message" => "Email o contraseña incorrectas",
				"alreadyExists" => false,
			];
		}

		if (password_verify($password, $user['password'])) {
			http_response_code(400);
			return [
				"message" => "Email o contraseña incorrectas",
				"alreadyExists" => false,
			];
		}

		$user['AlreadyExists'] = true;
		return $user;
	}
}
