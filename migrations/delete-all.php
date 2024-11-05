<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "DROP TABLE active_sessions";

if ($conn->query($sql)) {
	echo "active_sessions table deleted successfully\n";
} else {
	echo "Error deleting table: " . $conn->error . "\n";
}

$sql = "DROP TABLE users";

if ($conn->query($sql)) {
	echo "user table deleted successfully\n";
} else {
	echo "Error deleting table: " . $conn->error . "\n";
}
