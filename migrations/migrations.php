<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

if ($conn->connect_error) {
    die(' Connection failed: ' . $conn->connect_error);
}

echo " Connected successfully\n";

$conn->query('DROP DATABASE IF EXISTS ' . $_ENV['DB_NAME']);

$sql = 'CREATE DATABASE IF NOT EXISTS ' . $_ENV['DB_NAME'];

if ($conn->query($sql)) {
    echo " Database created successfully\n";
}

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
$migrationsDir = __DIR__;
$migrations = scandir($migrationsDir);

foreach ($migrations as $migration) {
    $NotMigrations = ['.', '..', 'migrations.php', 'data.json'];

    if (in_array($migration, $NotMigrations)) {
        continue;
    }

    $migrate = require $migrationsDir . '/' . $migration;

    try {
        $migrate($conn);
    } catch (Exception $e) {
        echo ' ' . $migration . ' failed: ' . $e->getMessage() . "\n";
    }
}
