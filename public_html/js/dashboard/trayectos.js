addEventListener("DOMContentLoaded", () => {
	const addTrayecto = document.querySelector("#addTrayecto");

	addTrayecto.addEventListener("click", () => {
		document.querySelector("#addTrayectoForm").classList.toggle("hidden");
		document.querySelector("#addTrayectoForm").classList.toggle("flex");

	});
})
