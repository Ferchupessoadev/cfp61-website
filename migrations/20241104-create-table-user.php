<?php


require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// table for users
$sql = 'CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);';

if ($conn->query($sql)) {
	echo "Users table created successfully\n";
} else {
	echo "Error creating table: " . $conn->error . "\n";
}

// insert admin user.
$sql = 'INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?);';

if ($stmt = $conn->prepare($sql)) {
	$password = password_hash($_ENV['ADMIN_PASS'], PASSWORD_BCRYPT);
	$stmt->bind_param('sss', $_ENV['ADMIN_USER'], $_ENV['ADMIN_EMAIL'], $password);
	$stmt->execute();
	echo "Admin user created successfully\n";
}
