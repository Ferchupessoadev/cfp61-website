addEventListener('DOMContentLoaded', () => {
	const form = document.getElementById('contact-form');
	const to = document.getElementById('to');
	const subject = document.getElementById('subject');
	const message = document.getElementById('message');

	form.addEventListener('submit', (event) => {
		event.preventDefault();
		const formData = new FormData();

		formData.append('to', to.value);
		formData.append('subject', subject.value);
		formData.append('message', message.value);

		fetch('/mail', {
			method: 'POST',
			body: formData
		})
			.then(response => {
				if (response.ok) {
					alert('Email sent successfully!');
					form.reset();
				} else {
					throw new Error('Error sending email');
				}
			})
			.catch(error => {
				console.error(error);
				alert('Error sending email');
			});
	});
});
