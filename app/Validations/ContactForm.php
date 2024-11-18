<?php

namespace App\Validations;

class ContactForm
{
	/**
	 * Validate contact form
	 * @param array $request
	 * @return array
	 * Returns a message of success or failure
	 **/
	public static function validate(array $request): array
	{
		$to = $request['to'];
		$subject = $request['subject'];
		$message = $request['message'];

		$to = trim($to);
		$subject = trim($subject);
		$message = trim($message);

		$response = [
			'success' => true,
			'message' => "datos validos",
			'errors' => [],
			'data' => [
				'to' => $to,
				'subject' => $subject,
				'body' => $message,
			]
		];


		if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
			$response['errors'][] = "Correo no válido";
		}
		if (empty($subject)) {
			$response['errors'][] = "Asunto no válido";
		}
		if (empty($message)) {
			$response['errors'][] = "Cuerpo del correo no válido";
		}

		if (empty($response['errors'])) {
			$response['success'] = true;
			$response['message'] = "Datos válidos";
		} else {
			$response['success'] = false;
			$response['message'] = "Errores de validación";
		}

		return $response;
	}
}
