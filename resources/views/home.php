<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Incio</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<h1>Hola</h1>
	<?php if (!empty($_SESSION['sesion'])): ?>
		<?= $_SESSION['username'] ?>

	<?php endif; ?>
</body>

</html>
