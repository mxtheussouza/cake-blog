$(document).ready(function() {
	habilitaBotoesAuth();
	loadEventosAuth();
});

var habilitaBotoesAuth = function() {
	$('#UserLoginForm').submit(function(e) {
		e.preventDefault();

		let model = 'Login';
		let url = '/users/authentication';
		let data = $('#UserLoginForm').serialize();
		let button = $('.btnLogin');
		let location = '/';

		auth(model, url, data, button, location);
	});

	$('#UserRegisterForm').submit(function(e) {
		e.preventDefault();

		let model = 'Registrar';
		let url = '/users/validation';
		let data = $('#UserRegisterForm').serialize();
		let button = $('.btnRegister');
		let location = '/login';

		auth(model, url, data, button, location);
	});
}

var loadEventosAuth = function() {
	blockSpace();
}

function blockSpace() {
	const inputUsername = $('#UserUsername');

	inputUsername.keypress(function(e) {
		if (e.keyCode === 32) {
			e.preventDefault();
		}
	});
}

function auth(model, url, data, button, location) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	$.ajax({
		type: 'POST',
		url: url,
		dataType: 'JSON',
		data: data,
		beforeSend: function() {
			button.html('<img src="../img/loading.gif"/>').attr('disabled', true);
		},
		success: function(response) {
			if (!response.error) {
				Toast.fire({
					icon: 'success',
					title: response.msg,
				});

				window.location.href = location;
			} else {
				Toast.fire({
					icon: 'error',
					title: response.msg,
				});
			}
		},
		error: function() {
            console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
		},
		complete: function() {
			button.html(model).attr('disabled', false);
		}
	});
}