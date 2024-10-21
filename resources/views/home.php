<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Incio</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<?php include 'partials/header.php'; ?>
	<?php if (isset($_SESSION['username'])): ?>
		<?= $_SESSION['username'] ?>
	<?php endif ?>
</body>

</html>
