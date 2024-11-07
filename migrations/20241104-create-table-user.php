<?php



// table for users
return function ($conn) {
	$sql = 'CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
	);';

	if ($conn->query($sql)) {
		echo " Users table created successfully\n";
	} else {
		echo "Error creating table: " . $conn->error . "\n";
	}
};
