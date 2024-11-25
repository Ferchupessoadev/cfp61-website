<?php

return function (mysqli $conn) {
	$sql = "CREATE TABLE IF NOT EXISTS preinscription (
		status boolean NOT NULL
	)";

	if ($conn->query($sql)) {
		echo " Table preinscription created successfully\n";
	} else {
		echo " Error creating table: " . $conn->error . "\n";
	}

	$sql = "INSERT INTO preinscription (status) VALUES (1)";

	if ($conn->query($sql)) {
		echo " Default data inserted successfully\n";
	} else {
		echo " Error inserting default data: " . $conn->error . "\n";
	}
};
