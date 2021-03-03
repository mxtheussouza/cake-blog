$(document).ready(function() {
	habilitaBotoesUser();
	loadEventosUser();
});

var habilitaBotoesUser = function() {
	$('.dropbtnprofile').click(function(e) {
		e.preventDefault();

		$('#myDropdownProfile').toggleClass('show');
	});

	$(window).click(function(e) {
		if (!e.target.matches('.dropbtnprofile')) {
			let dropdowns = $('.dropdown-content-profile');
			let i;

			for (i = 0; i < dropdowns.length; i++) {
				let openDropdown = dropdowns[i];

				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	});

	$('.btnDeletePost').click(function(e) {
		e.preventDefault();

		let id = $(this).attr("idDelete");
		let url = `/posts/delete/${id}`;

		deletePost(url);
	});
}

var loadEventosUser = function() {

}

function deletePost(url) {
	Swal.fire({
		title: 'Você deseja deletar este post?',
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#218838',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim, quero deletar!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: 'POST',
				url: url,
				dataType: "JSON",
				success: function (response) {
					console.log(response);
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
					});

					if(!response.error){
						Toast.fire({
							icon: 'success',
							title: response.msg,
						});
					}else{
						Toast.fire({
							icon: 'error',
							title: response.msg,
						});
					}
				},
			});
		}
	});
};
