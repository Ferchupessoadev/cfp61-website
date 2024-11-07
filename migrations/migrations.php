<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully\n";

$migrationsDir = __DIR__;
$migrations = scandir($migrationsDir);

foreach ($migrations as $migration) {
	$NotMigrations = ['.', '..', 'migrations.php'];

	if (in_array($migration, $NotMigrations)) {
		continue;
	}

	$migrate = require $migrationsDir . '/' . $migration;

	if (is_callable($migrate)) {
		$migrate($conn);
	} else {
		echo "Error: El archivo de migración '$migration' no retorna una función válida.\n";
	}
}
