Dropzone.autoDiscover = false;

$(document).ready(() => {
	habilitaBotoesPost();
	loadEventosPost();
	loadFormAddImg();
});

const habilitaBotoesPost = () => {
	$("#PostWriteForm").submit(e => {
		e.preventDefault();

		const url = "/posts/add";

		Swal.fire({
			title: "Tem certeza que deseja postar este conteúdo?",
			icon: "question",
			showCancelButton: true,
			cancelButtonText: "Cancelar",
			confirmButtonColor: "#218838",
			cancelButtonColor: "#d33",
			confirmButtonText: "Sim, quero postar!",
		}).then(result => {
			if (result.value) addPost(url);
		});
	});

	$(".removeImg").click(e => {
		e.preventDefault();

		const element = $(this);
		const completeUrl = $(this).attr("id");
		const urlSplit = completeUrl.split("/").join("-");

		deleteImg(urlSplit, element);
	});
};

const loadEventosPost = () => {
	$("#PostContent").keyup(() => {
		while (
			$(this).outerHeight() <
			this.scrollHeight +
				parseFloat($(this).css("borderTopWidth")) +
				parseFloat($(this).css("borderBottomWidth"))
		) {
			$(this).height($(this).height() + 1);
		}
	});
};

function addPost(url) {
	const dados = $("#PostWriteForm").serialize();

	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	$.ajax({
		type: "POST",
		url: url,
		dataType: "JSON",
		data: dados,
		beforeSend: () => {
			$(".btnSavePost").html("Postando...").attr("disabled", true);
		},
		success: response => {
			if (!response.error) {
				Toast.fire({
					icon: "success",
					title: response.msg,
				});
			} else {
				Toast.fire({
					icon: "error",
					title: response.msg,
				});
			}

			habilitaBotoesPost();
			loadEventosPost();
		},
		error: () => {
			console.log(
				"Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado",
			);
		},
		complete: () => {
			$(".btnSavePost").html("Postar").attr("disabled", false);
			$("#PostTitle").val("");
			$("#PostContent").val("");
		},
	});
}

function loadFormAddImg() {
	const myDropzone = new Dropzone("#blogPostImg", {
		url: `${baseUrl}/posts/imgBlog/`,
	});

	myDropzone.options.acceptedFiles = "image/*";
	myDropzone.options.maxFiles = 1;

	myDropzone.on("addedfile", file => {
		$(".title-dropzone").hide();
		$("#previewImg").remove();

		file.previewElement.append();
	});

	myDropzone.on("success", (file, response) => {
		this.removeFile(file);

		const prevImg = $("#postImg").val();

		if (prevImg != "") {
			prevImg = prevImg.split("/").join("-");
			cleanImages(`img/${prevImg}`);
		}

		$(".removeImg").attr("id", response);
		$("#imgPrev").attr("src", `/${response}`);
		$("#postImg").val(response);
		$(".removeImg").show();
	});
}

function cleanImages(url) {
	const cleanUrl = `${baseUrl}/posts/unlinkImage/${url}`;

	$.get(cleanUrl);
}

function deleteImg(url, element) {
	const deleteUrl = `${baseUrl}/posts/unlinkImage/${url}`;

	$.ajax({
		type: "GET",
		url: deleteUrl,
		dataType: "JSON",
		beforeSend: () => {
			element.prop("disabled", true).html("REMOVENDO...");
		},
		success: response => {
			if (!response.error) {
				$("#imgPrev").removeAttr("src");
				$(".title-dropzone").show();
				$("#postImg").val("");
				element.hide();
			}
		},
		error: () => {
			console.log("Ocorreu um erro interno, tente novamente mais tarde");
		},
		complete: () => {
			element.prop("disabled", false).html("REMOVER");
		},
	});
}
