'use strict'


export default class Alerts {
	constructor() {
		this.alerts = document.querySelector("#alerts");
		if (!this.alerts) throw new Error("Elemento #alerts no encontrado en el DOM");

		this.btnClose = this.alerts.querySelector("#alerts__close");
		if (!this.btnClose) throw new Error("Elemento #alerts__close no encontrado en el DOM");

		this.messageElement = this.alerts.querySelector("#alerts__message");
		if (!this.messageElement) throw new Error("Elemento #alerts__message no encontrado en el DOM");

		this.btnClose.addEventListener("click", () => this.hide());

		this.options = {
			style: {
				success: "bg-green-500",
				info: "bg-blue-500",
				warning: "bg-yellow-500",
				error: "bg-red-500",
			},
			message: {
				success: "Success",
				info: "Info",
				warning: "Warning",
				error: "Error",
			}
		};
	}

	hide() {
		this.alerts.classList.add("hidden");
		this.alerts.classList.remove("flex");
		this.messageElement.textContent = "";
	}

	show(message, type = "info", time = 3000) {
		if (!this.options.style[type]) {
			throw new Error(`Tipo de alerta desconocido: ${type}`);
		}

		this.alerts.classList.add("flex", this.options.style[type]);
		this.alerts.classList.remove("hidden");
		this.messageElement.textContent = message || this.options.message[type];

		setTimeout(() => {
			this.hide();
		}, time);
	}


	setOptions(newOptions = {}) {
		this.options = {
			...this.options,
			...newOptions,
			style: { ...this.options.style, ...newOptions.style },
			message: { ...this.options.message, ...newOptions.message }
		};
	}
}
