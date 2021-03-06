$(document).ready(function() {
	habilitaBotoesUser();
	loadEventosUser();
});

var habilitaBotoesUser = function() {
	$('.btnDeletePost').click(function(e) {
		e.preventDefault();

		let element = $(this);
		let id = $(this).attr("idDelete");
		let url = `/posts/delete/${id}`;

		deletePost(url, element);
	});
}

var loadEventosUser = function() {

}

function deletePost(url, element) {
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
				dataType: 'JSON',
				success: function (response) {
					element.parents('.card-container').remove();
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
