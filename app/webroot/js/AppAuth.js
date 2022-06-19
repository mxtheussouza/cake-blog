$(document).ready(function() {
	habilitaBotoesAuth();
	loadEventosAuth();
});

var habilitaBotoesAuth = function() {

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