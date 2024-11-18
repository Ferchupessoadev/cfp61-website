<?php


// Create courses table
return function (mysqli $conn) {
	$sql = 'CREATE TABLE `courses` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`image` varchar(255) NOT NULL,
	`content` text NOT NULL,
	PRIMARY KEY (`id`)
	)';

	if ($conn->query($sql)) {
		echo " Courses table created successfully\n";
	} else {
		echo " Error creating courses table: " . $conn->error . "\n";
	}
};
