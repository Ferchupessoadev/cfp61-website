<?php

namespace App\Models;

class CoursesModel extends Model
{
	public $table = 'courses';
	public string $name;
	public string $description;
	public string $image;
	public string $content;
	public bool $success;

	/**
	 * Set new course
	 * @param array $data
	 * @return bool
	 */
	public function save(): bool
	{
		try {
			$data = [$this->name, $this->description, $this->image, $this->content];
			$sql = "INSERT INTO {$this->table} (name, description, image, content) VALUES (?, ?, ?, ?)";
			$this->prepare($sql, $data);

			$this->success = true;
			return true;
		} catch (\Exception) {
			$this->success = false;
			return false;
		}
	}
}
