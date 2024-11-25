import Alerts from '../lib/Alerts.js';

const uploadMultimedia = async event => {
	const files = event.target.files;
	const alertsClass = new Alerts();

	if (files.length > 0) {
		const formData = new FormData();
		for (const file of files) {
			formData.append("file[]", file);
		}

		formData.append("csrf_token", document.querySelector("input[name=csrf_token]").value);
		alertsClass.show("Subiendo archivos...", "info", 3000);

		try {
			const response = await fetch("/api/multimedia/upload", {
				method: "POST",
				body: formData
			});
			if (!response.ok) {
				return response.json().then(err => {
					throw new Error(err.message);
				})
			};

			alertsClass.hide();
			alertsClass.show("Archivos subidos correctamente", "success", 3000);
			const data = await response.json();

			const containerFiles = document.querySelector("#files");

			data.files.forEach(file => {
				const img = document.createElement("img");
				const divContainer = document.createElement("div");
				const divOverlay = document.createElement("div");
				const button = document.createElement("button");

				// styles
				divOverlay.classList.add("absolute", "w-full", "h-full", "bg-[rgba(0,0,0,0.5)]", "hidden", "group-hover:flex", "flex-col", "items-center", "justify-center");
				divContainer.classList.add("w-max", "h-max", "relative", "group");
				button.classList.add("text-white", "text-2xl", "cursor-pointer");
				img.classList.add("size-32")
				img.classList.add("object-cover");

				// source
				img.src = file.path;

				button.innerHTML = `<i class="fa-solid fa-trash"></i>`;
				divOverlay.append(button);
				divContainer.append(divOverlay);
				divContainer.append(img);
				containerFiles.append(divContainer);

				// listeners
				button.addEventListener("click", event => deleteMultimedia(event, file.path));
			});
		} catch (error) {
			alertsClass.hide();
			alertsClass.show(error.message, "error", 3000);
			console.error(error);
		}
	}
}


const deleteMultimedia = (event, file) => {
	const formData = new FormData();
	formData.append("file", file);
	formData.append("csrf_token", document.querySelector("input[name=csrf_token]").value);

	const options = {
		method: "POST",
		body: formData
	}

	fetch(`/api/multimedia/delete`, options)
		.then(response => {
			if (!response.ok) {
				return response.json().then(err => {
					throw new Error(err);
				})
			}
			const alertsClass = new Alerts();
			alertsClass.hide();
			alertsClass.show("Archivo eliminado correctamente", "success", 3000);
			event.target.parentElement.parentElement.parentElement.remove();
			return response.json();
		})
		.then(data => {
			const alertsClass = new Alerts();
			alertsClass.hide();
			alertsClass.show(data.message, "success", 3000);
		})
		.catch(error => {
			const alertsClass = new Alerts();
			alertsClass.hide();
			alertsClass.show(error.message, "error", 3000);
			console.error(error.path);
		});
}

addEventListener('DOMContentLoaded', () => {
	const addMultimedia = document.querySelector("#addMultimedia");
	const multimedia = document.querySelector("#multimedia");

	// listeners
	addMultimedia.addEventListener("click", () => {
		document.querySelector("#addMultimediaForm").classList.toggle("hidden");
	});

	multimedia.addEventListener("change", event => uploadMultimedia(event));

	document.querySelectorAll('.btn-delete-file').forEach(element => {
		element.addEventListener("click", event => deleteMultimedia(event, element.parentElement.nextElementSibling.getAttribute('src')));
	});
})
