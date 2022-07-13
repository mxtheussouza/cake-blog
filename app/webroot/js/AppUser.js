$(document).ready(function() {
	habilitaBotoesUser();
	loadEventosUser();
});

var habilitaBotoesUser = function() {
	$('.btnEditPost').click(function(e) {
		e.preventDefault();

		let id = $(this).attr('idEdit');

		editPost(id);
	});

	$('.btnDeletePost').click(function(e) {
		e.preventDefault();

		let element = $(this);
		let id = $(this).attr('idDelete');
		let url = `/posts/delete/${id}`;

		deletePost(url, element);
	});

	$('.btnEditUser').click(function(e) {
		e.preventDefault();

		let id = $(this).attr('idEditUser');

		editUser(id);
	});

	$('.btnDeleteUser').click(function(e) {
		e.preventDefault();

		let id = $(this).attr('idDeleteUser');
		let url = `/users/delete/${id}`;

		deleteUser(url);
	});
}

var loadEventosUser = function() {
	blockSpace();
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
            $('.closePostEdit').click();
            $('input').attr('disabled', true);
            $('button').attr('disabled', true);
			$('.global-section').html(`<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"> <img src="/img/loading.gif"/> </div>`);
        },
        success: function (response) {
            if (!response.error) {
				Toast.fire({
					icon: 'success',
					title: response.msg,
				});
			} else {
				Toast.fire({
					icon: 'error',
					title: response.msg,
				});
			}

			getDados();
        },
        error: function () {
            console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
        },
        complete: function () {
            $('input').attr('disabled', false);
            $('button').attr('disabled', false);
        }
    });
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
					} else {
						Toast.fire({
							icon: 'error',
							title: response.msg,
						});
					}
				},
				error: function() {
					console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
				}
			});
		}
	});
}

function editUser(id) {
	let url = `/users/edit/${id}`;

	loadModal(url, function() {
		$('#UserEditForm').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Tem certeza que deseja atualizar esse usuário?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#218838',
				cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, quero atualizar!'
            }).then((result) => {
                if (result.value) {
                    updateUser(id);
                }
            });
        });

		loadFormChangePhoto(id);
	});
}

function updateUser(id) {
    let dados = $('#UserEditForm').serialize();
    let url = `/users/update/${id}`;

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
            $('.closeUserEdit').click();
            $('input').attr('disabled', true);
            $('button').attr('disabled', true);
			$('.global-section').html(`<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"> <img src="/img/loading.gif"/> </div>`);
        },
        success: function (response) {
            if (!response.error) {
				Toast.fire({
					icon: 'success',
					title: response.msg,
				});
			} else {
				Toast.fire({
					icon: 'error',
					title: response.msg,
				});
			}

			getDados();
        },
        error: function () {
			console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
        },
        complete: function () {
            $('input').attr('disabled', false);
            $('button').attr('disabled', false);
        }
    });
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

function getDados() {
    let url = window.location.href;

	$.ajax({
        type: 'GET',
        url: url,
        dataType: 'HTML',
        success: function(data) {
            $('.global-section').html(($(data).find('.global-section > ')));

			changePhotos();
            habilitaBotoesUser();
        },
        error: function() {
            console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
        }
    });
}

function loadModal(url, callback = null) {
    let modal = $('#myModal');

    modal.modal();
    modal.find('#modalContent').html('');
    modal.find('#modalContent').append(
		`<div class="section-body alert alert-callout" style="background-color: #b8403f; margin:0;" role="alert">
			<strong style="color: white;">Carregando...</strong>
			<i class="fa fa-spinner fa-spin" style="color: white;"></i>
		</div>`
	);

    $('#modalContent').load(url + ' #content >', function() {
		if (callback != null) {
        	callback();
		}

		habilitaBotoesUser();
		loadEventosUser();
    });
}

function loadFormChangePhoto(id) {
	if (typeof $('#UserPhotoForm')[0].dropzone != 'undefined') {
		return false;
	}

	let myDropzone = new Dropzone('#UserPhotoForm');

	myDropzone.options.acceptedFiles = 'image/*';
	myDropzone.options.maxFiles = 1;
	myDropzone.options.params = {
		user_id: id,
	}

	myDropzone.on('addedfile', function(file) {

		let removeButton = Dropzone.createElement('<button class="btn btn-red" style="width: 100%; padding: 3px; margin-top: 5px;">Remover</button>');

		let _this = this;

		removeButton.addEventListener('click', function(e) {
			e.preventDefault();
			e.stopPropagation();

			$('.dz-details img').removeAttr('src');
			$('#UserPhotoForm').html('<small> Insira sua imagem aqui </small>');
		});

		file.previewElement.appendChild(removeButton);
	});
}

function changePhotos() {
	let newPhoto = $('.dz-details img').attr('src');

	$('.header-nav img').attr('src', newPhoto);
	$('.user-image .img-avatar').attr('src', newPhoto);
	$('.wrapfooter .img').attr('src', newPhoto);
}

function blockSpace() {
	const inputUsername = $('#UserUsername');

	inputUsername.keypress(function(e) {
		if (e.keyCode === 32) {
			e.preventDefault();
		}
	});
}