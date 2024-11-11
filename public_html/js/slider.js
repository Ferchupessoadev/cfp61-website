/**
 * slider class for move the slider
 * @param {string} container
 * @param {string} slider
 * @param {string} sliderSections
 * @param {string} btnRight
 * @param {string} btnLeft
 *
 * All parameters are strings.
 * All parameters are selectors.
 * All parameters are ids or classes.
 */
export default class Slider {
	constructor(container, slider, sliderSections, btnRight, btnLeft) {
		this.container = document.querySelector(container);
		this.slider = document.getElementById(slider);
		this.sliderSections = document.querySelectorAll(sliderSections);
		this.sliderSectionsClass = sliderSections;

		this.btnRight = document.getElementById(btnRight);
		this.btnLeft = document.getElementById(btnLeft);


		// init
		this.slider.insertAdjacentElement('afterbegin', this.sliderSections[this.sliderSections.length - 1]);
	}

	updateSliderSections() {
		this.sliderSections = document.querySelectorAll(this.sliderSectionsClass);
	}

	init() {

		// listeners
		this.btnLeft.addEventListener('click', () => this.prev());
		this.btnRight.addEventListener('click', () => this.next());

		// interval
		setInterval(() => {
			this.next();
		}, 5000);
	}

	next() {
		this.slider.style.marginLeft = "-200%";
		this.slider.style.transition = "all 0.5s";
		setTimeout(() => {
			this.slider.style.transition = "none";
			this.slider.insertAdjacentElement('beforeend', this.sliderSections[0]);
			this.slider.style.marginLeft = "-100%";
			this.updateSliderSections();
		}, 500);
	}

	prev() {
		this.slider.style.marginLeft = "0";
		this.slider.style.transition = "all 0.5s";
		setTimeout(() => {
			this.slider.style.transition = "none";
			this.slider.insertAdjacentElement('afterbegin', this.sliderSections[this.sliderSections.length - 1]);
			this.slider.style.marginLeft = "-100%";
			this.updateSliderSections();
		}, 500);
	}
}
