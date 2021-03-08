Dropzone.autoDiscover = false;

$(document).ready(function() {
	habilitaBotoesPost();
	loadEventosPost();
	loadFormAddImg();
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

	$(".removeImg").click(function(e){
		e.preventDefault();

		let element = $(this);
		let completeUrl = $(this).attr('id');
		let urlSplit = completeUrl.split('/').join('-');

		deleteImg(urlSplit, element);
	});
}

var loadEventosPost = function() {
	$('#PostContent').keyup(function() {
		while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css('borderTopWidth')) + parseFloat($(this).css('borderBottomWidth'))) {
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
        	$('.btnSavePost').html('Postando...').attr('disabled', true);
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
        	$('.btnSavePost').html('Postar').attr('disabled', false);
			$('#PostTitle').val('');
			$('#PostContent').val('');
		},
    });
}

function loadFormAddImg() {
	var myDropzone = new Dropzone("#blogPostImg", {
		url: `${baseUrl}/posts/imgBlog/`
	});

	myDropzone.options.acceptedFiles = 'image/*';
	myDropzone.options.maxFiles = 1;

	myDropzone.on("addedfile", function(file){
		$(".title-dropzone").hide();
		$("#previewImg").remove();

		file.previewElement.append();
	});

	myDropzone.on("success", function(file, response){
		this.removeFile(file);
		console.log(response);

		let prevImg = $("#postImg").val();

		if (prevImg != "") {
			prevImg = prevImg.split('/').join('-');
			cleanImages("img/"+prevImg);
		}

		$(".removeImg").attr("id", response);
		$("#imgPrev").attr("src", response);
		$("#postImg").val(response);
		$(".removeImg").show();
	});
}

function cleanImages(url) {
	let cleanUrl = `${baseUrl}/posts/unlinkImage/${url}`;

	$.get(cleanUrl);
}

function deleteImg(url, element) {
	let deleteUrl = `${baseUrl}/posts/unlinkImage/${url}`;

	$.ajax({
		type: 'GET',
		url: deleteUrl,
		dataType: 'JSON',
		beforeSend: function() {
			element.prop("disabled",true).html("REMOVENDO...")
		},
		success: function(response) {
			if(!response.error){
				$("#imgPrev").removeAttr("src");
				$(".title-dropzone").show();
				$("#postImg").val("");
				element.hide();
			}
		},
		error: function() {
			console.log("Ocorreu um erro interno, tente novamente mais tarde");
		},
		complete: function() {
			element.prop("disabled", false).html("REMOVER");
		}
	});
}
