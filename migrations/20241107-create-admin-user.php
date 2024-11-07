<?php

return function (mysqli $conn) {
	$sql = 'INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)';

	if ($stmt = $conn->prepare($sql)) {
		$password = password_hash($_ENV['ADMIN_PASS'], PASSWORD_BCRYPT);
		$stmt->bind_param('sss', $_ENV['ADMIN_USER'], $_ENV['ADMIN_EMAIL'], $password);
		$stmt->execute();
		echo " Admin user created successfully\n";
	}
};
