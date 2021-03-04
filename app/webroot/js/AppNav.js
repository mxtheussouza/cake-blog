$(document).ready(function() {
	habilitaBotoesNav();
	loadEventosNav();
});

var habilitaBotoesNav = function() {
	$('.dropbtn').click(function(e) {
		e.preventDefault();

		$('#myDropdown').toggleClass('show');
	});

	$(window).click(function(e) {
		if (!e.target.matches('.dropbtn')) {
			let dropdowns = $('.dropdown-content');
			let i;

			for (i = 0; i < dropdowns.length; i++) {
				let openDropdown = dropdowns[i];

				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	});

	$('#btnLogout').click(function(e) {
		e.preventDefault();

		logoutUser();
	});
}

var loadEventosNav = function() {
	// darkMode();
}

function logoutUser() {
	Swal.fire({
		title: 'Você deseja sair?',
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#218838',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim, quero sair!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: '/logout',
				success: function () {
					location.reload();
				},
			});
		}
	});
}

// function darkMode() {
//     let buttonChange = $('.theme-button');
//     let contents = $('body, .wrapthumbnail, .wrapcontent');

//     buttonChange.click(() => {
//         setDarkMode = localStorage.getItem('dark-theme');

//         if (setDarkMode !== 'on') {
//             contents.toggleClass('dark-theme');
//             buttonChange.toggleClass('fa-toggle-on');

//             setDarkMode = localStorage.setItem('dark-theme', 'on');
//             setDarkMode = localStorage.setItem('fa-toggle-on', 'on');
//         } else {
//             contents.toggleClass('dark-theme');
//             buttonChange.toggleClass('fa-toggle-on');

//             setDarkMode = localStorage.setItem('dark-theme', null);
//             setDarkMode = localStorage.setItem('fa-toggle-on', null);
//         }
//     });

//     let setDarkMode = localStorage.getItem('dark-theme');
//     if (setDarkMode === 'on') {
//         contents.toggleClass('dark-theme');
//         buttonChange.toggleClass('fa-toggle-on');
//     }
// }
