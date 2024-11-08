<?php

return function ($conn) {
	$sql = "create table if not exists active_sessions (
    session_id varchar(255) primary key not null,
    user_id int not null,
	session_data text,
    last_activity int,
	ip_address varchar(255),
    is_active boolean default 1,
	foreign key (user_id) references users(id) on delete cascade
)";

	if ($conn->query($sql)) {
		echo " active_sessions table created successfully\n";
	} else {
		echo " Error creating table: " . $conn->error . "\n";
	}
};
