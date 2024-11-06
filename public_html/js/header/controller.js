
export default class HeaderController {
	constructor(idDropdown, idbtnDropdown) {
		this.idDropdown = idDropdown;
		this.idbtnDropdown = idbtnDropdown;
	}

	init(idDropdown, idbtnDropdown) {
		this.idDropdown = idDropdown;
		this.idbtnDropdown = idbtnDropdown;
	}

	listeners() {
		const btnDropdown = document.getElementById(this.idbtnDropdown);
		btnDropdown.addEventListener('click', () => this.onClick());
	}

	onClick() {
		const dropdown = document.getElementById(this.idDropdown);
		dropdown.classList.toggle('hidden')
		console.log("click")
	}
}
