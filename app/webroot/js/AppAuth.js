$(document).ready(() => {
	habilitaBotoesAuth();
	loadEventosAuth();
});

const habilitaBotoesAuth = () => {
	$("#UserLoginForm").submit(e => {
		e.preventDefault();

		const model = "Login";
		const url = "/users/authentication";
		const data = $("#UserLoginForm").serialize();
		const button = $(".btnLogin");
		const location = "/";

		auth(model, url, data, button, location);
	});

	$("#UserRegisterForm").submit(e => {
		e.preventDefault();

		const model = "Registrar";
		const url = "/users/validation";
		const data = $("#UserRegisterForm").serialize();
		const button = $(".btnRegister");
		const location = "/login";

		auth(model, url, data, button, location);
	});
};

const loadEventosAuth = () => {
	blockSpace();
};

function blockSpace() {
	const inputUsername = $("#UserUsername");

	inputUsername.keypress(e => {
		if (e.keyCode === 32) e.preventDefault();
	});
}

function auth(model, url, data, button, location) {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	$.ajax({
		type: "POST",
		url: url,
		dataType: "JSON",
		data: data,
		beforeSend: () => {
			button.html('<img src="../img/loading.gif"/>').attr("disabled", true);
		},
		success: response => {
			if (!response.error) {
				Toast.fire({
					icon: "success",
					title: response.msg,
				});

				window.location.href = location;
			} else {
				Toast.fire({
					icon: "error",
					title: response.msg,
				});
			}
		},
		error: () => {
			console.log(
				"Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado",
			);
		},
		complete: () => {
			button.html(model).attr("disabled", false);
		},
	});
}
