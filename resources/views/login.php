<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen">
	<header class="h-16 flex justify-center items-center">
		<h1 class="text-3xl font-bold">Login</h1>
		<button>

		</button>
	</header>
	<section class="flex justify-center items-center h-[calc(100vh_-_64px)]">
		<form class="flex flex-col items-center bg-white shadow-2xl rounded px-8 pt-6 pb-8 mb-4 w-2/3" action="/login" method="post">
			<input class="px-4 py-2 mb-4 border-2 w-full" type="email" name="email" placeholder="Correo electronico">
			<input class="px-4 py-2 mb-4 border-2 w-full" type="password" name="password" placeholder="Contraseña">
			<input class="px-4 py-2 mb-4 border-2 w-max cursor-pointer hover:bg-gray-100" type="submit" value="Iniciar sesion">
		</form>
	</section>
</body>

</html>
