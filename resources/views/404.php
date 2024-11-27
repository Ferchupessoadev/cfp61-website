<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CFP N°61 - Página no encontrada</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://kit.fontawesome.com/f845b9182b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/css/app.css">
</head>

<body>
	<header
	    class="flex justify-between items-center h-20 p-2 bg-slate-900">
	    <div class="flex gap-2 h-20 py-2">
	        <img class="h-full" src="/img/logo.png" alt="Centro de formación profesional de la Criolla">
	        <p class="flex flex-col justify-center items-center text-white">
	          CFP N°61
	        </p>
	    </div>
	    <nav class="hidden md:flex justify-between items-center px-4">
	        <ul class="flex justify-between items-center gap-10">
	            <li class="h-full font-semibold group"><a class="transition-colors duration-300 text-white h-full w-full group-hover:text-gray-600" href="/">inicio</a></li>
	            <li class="h-full font-semibold group"><a class="transition-colors duration-300 text-white h-full w-full group-hover:text-gray-600" href="/quienes-somos">quienes somos</a></li>
	            <li class="h-full font-semibold group"><a class="transition-colors duration-300 text-white h-full w-full group-hover:text-gray-600" href="/trayectos">trayectos</a></li>
	            <li class="h-full font-semibold group"><a class="transition-colors duration-300 text-white h-full w-full group-hover:text-gray-600" href="/contacto">contactanos</a></li>
	        </ul>
	    </nav>
			<button id="menu-btn" class="flex flex-col justify-center items-center md:hidden outline-none focus:outline-none">
				<i class="fa-solid fa-bars text-white text-3xl"></i>
	    </button>
			<nav id="nav-responsive" class="transition-all duration-500 -translate-x-full w-full h-[calc(100vh-72px)] md:hidden flex flex-col justify-center items-center gap-10 text-white bg-[#222] bg-slate-900 fixed top-20 left-0 z-10">
				<ul class="flex flex-col justify-center gap-10 w-full px-4">
					<li class="flex font-semibold group"><a class="transition-colors duration-300 px-4 py-2 text-white w-full group-hover:bg-transparent rounded group-active:bg-gray-600" href="/">Inicio</a></li>
					<li class="flex font-semibold group"><a class="transition-colors duration-300 px-4 py-2 text-white w-full group-hover:bg-transparent rounded group-active:bg-gray-600" href="/quienes-somos">Quienes somos</a></li>
					<li class="flex font-semibold group"><a class="transition-colors duration-300 px-4 py-2 text-white w-full group-hover:bg-transparent rounded group-active:bg-gray-600" href="/trayectos">Trayectos</a></li>
					<li class="flex font-semibold group"><a class="transition-colors duration-300 px-4 py-2 text-white w-full group-hover:bg-transparent rounded group-active:bg-gray-600" href="/contacto">Contactanos</a></li>
			</nav>
	</header>

	<script>
		const menu = document.querySelector('#menu-btn');
		const nav = document.querySelector('#nav-responsive');
	
		menu.addEventListener('click', () => {
			nav.classList.toggle('-translate-x-full');
		});
	</script>

	<section class="flex justify-center items-center flex-col md:flex-row h-screen w-full bg-[linear-gradient(to_right,#f0f9ff,#a8c0ff)]">
		<div class="flex flex-col justify-center items-center gap-2 w-full md:w-1/2 md:order-1">
			<img class="h-64" src="/img/logo.png" alt="">
		</div>
		<div class="flex flex-col justify-center items-center gap-2 w-full md:w-1/2 md:order-2">
			<h2 class="text-lg md:text-4xl font-bold text-[var(--bg-primary)]">¡Me estas matando!</h2>
			<p class="text-md md:text-2xl font-bold text-black">Página no encontrada</p>
			<a href="/" class="text-md font-bold text-[var(--bg-primary)] underline">Volver a la página principal</a>
		</div>
	</section>
	<footer class="flex flex-col justify-center items-between gap-2 bg-slate-900 w-full py-5">
	    <div class="flex md:flex-row flex-col justify-center items-center gap-8 h-max py-10">
	        <div class="flex-1 flex flex-col items-center gap-2">
	            <img class="w-16" src="/img/logo.png" alt="Centro de formación profesional de la Criolla">
							<h3 class="text-lg font-bold">CFP61</h3>
	        </div>
	        <div class="flex-1 flex flex-col items-center">
							<h3 class="text-gray-500">Correos</h3>
	            <ul>
	                <li class="text-sm"><a href="mailto:cfplacriolla@gmail.com">Administración</a></li>
	                <li class="text-sm"><a href="mailto:cfp61.lacriolla@gmail.com">Rectoría</a></li>
									<li class="text-sm"><a href="mailto:cfp61.cd@entrerios.edu.ar">Institucional</a></li>
	            </ul>
	        </div>
	        <div class="flex-1 flex flex-col items-center">
							<h3 class="text-gray-500">Legal</h3>
	            <ul>
	                <li class="text-sm"><a href="/policy">Política de privacidad</a></li>
	                <li class="text-sm"><a href="/legal">Términos y condiciones</a></li>
	            </ul>
	        </div>
	        <div class="flex-1 flex flex-col items-center">
						<h3 class="text-gray-500">Información</h3>
	            <ul>
	                <li class="text-sm"><a href="/faq">Preguntas frecuentes</a></li>
	                <li class="text-sm"><a href="/contacto">Contacto</a></li>
	            </ul>
	        </div>
	    </div>
	    <div class="flex justify-center items-center w-full">
	        <p class="text-white flex flex-col items-center justify-center text-sm">
				<span>&copy; <?= date('Y') ?> Centro de formación profesional N° 61. Todos los derechos reservados.</span>
	            <span>Desarrollado por <a class="text-sky-400 underline" href="https://ferchudev.com" target="_blank">Fernando Pessoa</a></span>
	        </p>
	    </div>
	</footer>
</body>

</html>
