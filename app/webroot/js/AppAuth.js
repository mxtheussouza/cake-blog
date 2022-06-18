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
	const inputNickname = $('#UserNickname');

	inputNickname.keypress(function(e) {
		if (e.keyCode === 32) {
			e.preventDefault();
		}
	});
}