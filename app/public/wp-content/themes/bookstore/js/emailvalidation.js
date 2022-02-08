const form = document.getElementById('form');
form.addEventListener('submit', e => {
	e.preventDefault();
	const email = form['email'].value;
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (email === '') {
		addErrorTo('email', 'Whoops! It looks like you forgot to add your email');
	} else if (!regex.test(email)) {
		addErrorTo('email', 'Please provide a valid email address');
	} else {
		removeErrorFrom('email');
		document.getElementById('form').reset();
	}
});
function addErrorTo(field, message) {
	const formControl = form[field].parentNode;
	formControl.classList.add('error');
	const small = formControl.querySelector('small');
	small.innerText = message;
}
function removeErrorFrom(field) {
	const formControl = form[field].parentNode;
	formControl.classList.remove('error');
}