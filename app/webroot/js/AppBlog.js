$(document).ready(function() {
	habilitaBotoesBlog();
	loadEventosBlog();
});

var habilitaBotoesBlog = function() {
	$('.navigation > ul > li > a').click(function(e) {
        e.preventDefault();

        let url = $(this).attr('href');
        $('html,body').scrollTop(0);

        blogsPaginate(url);
    });
}

var loadEventosBlog = function() {

}

function blogsPaginate(url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'HTML',
        beforeSend: function() {
        	$(".content-blog").html(`<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"> <img src="../img/loading.gif"/> </div>`);
        },
        success: function(data) {
            $('.content-blog').html(($(data).find('.content-blog > ')));
            habilitaBotoesBlog();
        },
        error: function() {
            console.log('Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado');
        }
    });
}
