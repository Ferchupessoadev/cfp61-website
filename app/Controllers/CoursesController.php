<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\CoursesModel;
use App\Validations\Courses;

class CoursesController extends Controller
{
	public function index(string $name): string
	{
		$model = new CoursesModel();
		$courses = $model->all();

		foreach ($courses as $course) {
			if ($course['name'] === $name) {
				return view('course', ['course' => $course]);
			}
		}

		return [
			"success" => false,
			"message" => "404 - Not Found",
		];
	}

	public function getCourses(): array
	{
		$model = new CoursesModel();

		return $model->all();
	}

	/**
	 * @return array
	 */
	public function setCourse(): array
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		if (!$result) {
			http_response_code(401);
			return [
				'success' => false,
				'message' => 'noni noni, no estas autorizado para entrar aqui',
			];
		}

		$name = $this->request['name'];
		$description = $this->request['description'];
		$image = $this->request['image'];  // url. No es un archivo, los archivos se cargan en /admin/multimedia
		$content = $this->request['content'];

		$model = new CoursesModel();
		$validation = Courses::validate($name, $description, $image, $content);
		if (!$validation['success']) {
			http_response_code(400);
			return $validation['errors'];
		}

		$model->name = $name;
		$model->description = $description;
		$model->image = $image;
		$model->content = $content;
		$model->save();

		if (!$model->success) {
			http_response_code(500);
			return [
				'success' => false,
				'message' => 'Error al crear el curso',
			];
		}

		return [
			'success' => true,
			'message' => 'Curso creado exitosamente',
			'data' => [
				'name' => $model->name,
				'description' => $model->description,
				'image' => $model->image,
				'content' => $model->content
			]
		];
	}
}
