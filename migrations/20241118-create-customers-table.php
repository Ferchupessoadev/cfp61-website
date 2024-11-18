<?php

// Create customers table for the registration form
return function ($conn) {
	$sql = 'CREATE TABLE IF NOT EXISTS `customers` (
	dni VARCHAR(255) NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	phone VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	address VARCHAR(255) NOT NULL,
	courses_id INT NOT NULL,
	FOREIGN KEY (courses_id) REFERENCES courses(id) ON DELETE CASCADE
	)';

	if ($conn->query($sql)) {
		echo " Customers table created successfully\n";
	} else {
		echo " Error creating table: " . $conn->error . "\n";
	}
};
