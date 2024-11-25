<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\PreInscription;
use App\Models\CoursesModel;
use App\Services\Mail;
use App\Validations\ContactForm;

class HomeController extends Controller
{
	/**
	 * method Index.
	 * principal page
	 * @return string
	 */
	public function index(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		$preInscription = new PreInscription();
		$resultInscription = $preInscription->handle();

		return view('home', ['logged' => $result['success'], 'status_inscription' => $resultInscription['success']]);
	}

	public function info(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('quienes-somos', ['logged' => $result['success']]);
	}

	public function trayectos(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		$courses = new CoursesModel();
		$result = $courses->all();

		return view('trayectos', ['logged' => $result['success'], 'courses' => $result]);
	}

	public function contact(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		return view('contacto', ['logged' => $result['success']]);
	}

	/**
	 * method mail.
	 *
	 * @return array
	 */
	public function mail(): array|string
	{
		$isValid = ContactForm::validate($this->request);
		if (!$isValid['success']) {
			return $isValid;
		}

		$to = $this->request['to'];
		$subject = $this->request['subject'];
		$message = $this->request['message'];

		$to = htmlspecialchars($to);
		$subject = htmlspecialchars($subject);
		$message = htmlspecialchars($message);

		$response = Mail::send($to, $subject, $message);

		return $response;
	}

	public function preinscription(): string
	{
		$preInscription = new PreInscription();
		$result = $preInscription->handle();

		$authMiddleware = new AuthMiddleware();
		$resulAuth = $authMiddleware->handle();

		if (!$result['success'] && $result['message'] == 'La preinscripcion no esta disponible') {
			return view(
				'preinscription',
				[
					'message' => $result['message'],
					'logged' => $resulAuth['success'],
					'status' => $result['success']
				]
			);
		}

		$coursesModel = new CoursesModel();
		$courses = $coursesModel->all();

		return view(
			'preinscription',
			[
				'logged' => $resulAuth['success'],
				'message' => $result['message'],
				'courses' => $courses,
				'status' => $result['success']
			]
		);
	}
}
