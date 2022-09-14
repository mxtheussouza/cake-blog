$(document).ready(() => {
	habilitaBotoesBlog();
	loadEventosBlog();
});

const habilitaBotoesBlog = () => {
	$(".navigation > ul > li > a").click(e => {
		e.preventDefault();

		const url = $(this).attr("href");
		$("html,body").scrollTop(0);

		blogsPaginate(url);
	});
};

const loadEventosBlog = () => {};

function blogsPaginate(url) {
	$.ajax({
		type: "GET",
		url: url,
		dataType: "HTML",
		beforeSend: () => {
			$(".content-blog").html(
				`<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"> <img src="../img/loading.gif"/> </div>`,
			);
		},
		success: data => {
			$(".content-blog").html($(data).find(".content-blog > "));
			habilitaBotoesBlog();
		},
		error: () => {
			console.log(
				"Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado",
			);
		},
	});
}
