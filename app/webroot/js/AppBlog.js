$(document).ready(function() {
	loadEventos();
});

const loadEventos = function() {
	$('.dropbtn').click(function(e) {
		e.preventDefault();

		$('#myDropdown').toggleClass('show');
	});
}
