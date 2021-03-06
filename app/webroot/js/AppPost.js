$(document).ready(function() {
	habilitaBotoesPost();
	loadEventosPost();
});

var habilitaBotoesPost = function() {
	$('#PostWriteForm').submit(function(e) {
		e.preventDefault();

		let url = '/posts/add';

		Swal.fire({
            title: 'Tem certeza que deseja postar este conteúdo?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#218838',
			cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, quero postar!',
		}).then((result) => {
            if (result.value) {
				addPost(url);
            }
		});
	});
}

var loadEventosPost = function() {
	$('#PostContent').keyup(function() {
		while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
			$(this).height($(this).height()+1);
		};
	});
}

function addPost(url) {
	let dados = $('#PostWriteForm').serialize();

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
        beforeSend: function() {
        	$('button').html('Postando...').attr('disabled', true);
        },
        success: function(response) {
			if (!response.error) {
				Toast.fire({
					icon: 'success',
					title: response.msg,
				});
			}

            habilitaBotoesPost();
        },
        error: function(response) {
			Toast.fire({
				icon: 'error',
				title: response.msg,
			});
        },
		complete: function() {
        	$('button').html('Postar').attr('disabled', false);
			$('#PostTitle').val('');
			$('#PostContent').val('');
		},
    });
}
