<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS active_sessions (
    session_id VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id INT NOT NULL,
    last_activity INT,
    is_active BOOLEAN DEFAULT 1,
	FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql)) {
	echo "active_sessions table created successfully\n";
} else {
	echo "Error creating table: " . $conn->error . "\n";
}
