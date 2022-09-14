$(document).ready(() => {
	habilitaBotoesNav();
	loadEventosNav();
});

const habilitaBotoesNav = () => {
	$(".dropbtn").click(e => {
		e.preventDefault();

		$("#myDropdown").toggleClass("show");
	});

	$(window).click(e => {
		if (!e.target.matches(".dropbtn")) {
			const dropdowns = $(".dropdown-content");

			let i;

			for (i = 0; i < dropdowns.length; i++) {
				const openDropdown = dropdowns[i];

				if (openDropdown.classList.contains("show"))
					openDropdown.classList.remove("show");
			}
		}
	});

	$("#btnLogout").click(e => {
		e.preventDefault();

		logoutUser();
	});
};

const loadEventosNav = () => {
	// darkMode();
};

function logoutUser() {
	Swal.fire({
		title: "Você deseja sair?",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: "#218838",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sim, quero sair!",
		cancelButtonText: "Cancelar",
	}).then(result => {
		if (result.value) {
			$.ajax({
				url: "/logout",
				success: function () {
					window.location.href = "/";
				},
			});
		}
	});
}

// function darkMode() {
//     const buttonChange = $('.theme-button');
//     const contents = $('body, .wrapthumbnail, .wrapcontent');

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

//     const setDarkMode = localStorage.getItem('dark-theme');
//     if (setDarkMode === 'on') {
//         contents.toggleClass('dark-theme');
//         buttonChange.toggleClass('fa-toggle-on');
//     }
// }
