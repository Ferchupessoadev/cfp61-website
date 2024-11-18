<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\CoursesModel;
use App\Validations\Courses;
use Spyframe\lib\Route;

class DashboardController extends Controller
{
	public function index(): string
	{
		$authMiddleware = new AuthMiddleware();
		$result = $authMiddleware->handle();

		if (!$result) {
			Route::redirect('/login');
		}

		return view('administrator.dashboard', ["logged" => $result]);
	}

	public function getCourses(): array
	{
		$model = new CoursesModel();

		return $model->all();
	}

	public function setCourse(): array
	{
		$name = $this->request['name'];
		$description = $this->request['description'];
		$image = $this->request['image'];
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
				"success" => false,
				"message" => "Error al crear el curso",
			];
		}

		return [
			"success" => true,
			"message" => "Curso creado exitosamente",
			"data" => [
				'name' => $model->name,
				'description' => $model->description,
				'image' => $model->image,
				'content' => $model->content
			]
		];
	}
}
