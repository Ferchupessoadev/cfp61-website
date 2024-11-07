<?php

return function ($conn) {
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
};
