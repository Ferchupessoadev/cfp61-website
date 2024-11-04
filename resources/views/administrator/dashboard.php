<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<?php include __DIR__ . '/../partials/header.php'; ?>
	<h1>Hola, <?= $_SESSION['username']; ?></h1>

</body>

</html>
