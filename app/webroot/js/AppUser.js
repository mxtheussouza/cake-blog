$(document).ready(function() {
	habilitaBotoesUser();
	loadEventosUser();
});

var habilitaBotoesUser = function() {
	$('.btnEditPost').click(function(e) {
		e.preventDefault();

		let id = $(this).attr("idEdit");

		editPost(id);
	});

	$('.btnDeletePost').click(function(e) {
		e.preventDefault();

		let element = $(this);
		let id = $(this).attr("idDelete");
		let url = `/posts/delete/${id}`;

		deletePost(url, element);
	});

	$('.btnDeleteUser').click(function(e) {
		e.preventDefault();

		let id = $(this).attr("idDeleteUser");
		let url = `/users/deleteUser/${id}`;

		deleteUser(url);
	});
}

var loadEventosUser = function() {

}

function editPost(id) {
	let url = `/posts/edit/${id}`;

	loadModal(url, function() {
		$('#PostEditForm').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Tem certeza que deseja atualizar esse post?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#218838',
				cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, quero atualizar!'
            }).then((result) => {
                if (result.value) {
                    updatePost(id);
                }
            });
        });
	});
}

function updatePost(id) {
    let dados = $('#PostEditForm').serialize();
    let url = `/posts/update/${id}`;

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
		data: dados,
        beforeSend: function () {
            $('input').attr('disabled', true);
            $('button').attr('disabled', true);
        },
        success: function (response) {
            if (!response.error) {
				Toast.fire({
					icon: 'success',
					title: response.msg,
				});
			}
        },
        error: function (response) {
			Toast.fire({
				icon: 'error',
				title: response.msg,
			});
        },
        complete: function () {
            $('input').attr('disabled', false);
            $('button').attr('disabled', false);
            $('.closePostEdit').click();
        }
    })
  }

function deletePost(url, element) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	Swal.fire({
		title: 'Você deseja deletar este post?',
		icon: 'warning',
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
					if (!response.error) {
						Toast.fire({
							icon: 'success',
							title: response.msg,
						});
					}
				},
				error: function(response) {
					Toast.fire({
						icon: 'error',
						title: response.msg,
					});
				}
			});
		}
	});
}

function editUser() {

}

function deleteUser(url) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	Swal.fire({
		title: 'Você deseja deletar este usuário?',
		icon: 'warning',
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
					if (!response.error) {
						Toast.fire({
							icon: 'success',
							title: response.msg,
						});
					}
				},
				error: function(response) {
					Toast.fire({
						icon: 'error',
						title: response.msg,
					});
				},
				complete: function() {
					if (window.location.href == `${baseUrl}/users/schedule`) {
						location.reload();
					} else {
						window.location.href = '/logout';
					}
				}
			});
		}
	});
}

function loadModal(url, callback = null) {
    let modal = $("#myModal");

    modal.modal();
    modal.find("#modalContent").html("");

    modal
	.find("#modalContent")
	.append(
	'<section> <div class="section-body alert alert-callout" style="background-color: #b8403f;"  role="alert"> <strong style="color:white; ">Carregando...</strong> <i class="fa fa-spinner fa-spin" style="color:white;"></i></div></section>'
	);

    $("#modalContent").load(url + " #content >", function() {
      if (callback != null) {
        callback();
	}

      habilitaBotoesUser();
    });
}
