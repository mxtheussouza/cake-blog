$(document).ready(function() {
	habilitaBotoes();
	loadEventos();
	darkMode();
});

var habilitaBotoes = function() {
	$('.dropbtn').click(function(e) {
		e.preventDefault();

		$('#myDropdown').toggleClass('show');
	});

	$(window).click(function(e) {
		if (!e.target.matches('.dropbtn')) {
			let dropdowns = $('.dropdown-content');
			let i;

			for (i = 0; i < dropdowns.length; i++) {
				let openDropdown = dropdowns[i];

				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	});

	$('.navigation > ul > li > a').click(function(e){
        e.preventDefault();

        let url = $(this).attr("href");
        $('html,body').scrollTop(0);
        blogsPaginate(url);
    });
}

var loadEventos = function() {
	darkMode();
}

function blogsPaginate(url){
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        beforeSend: function(){
        $(".content-blog").html(`<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;"> <img src="../img/loading.gif"/> </div>`);
        },
        success:function(data){
            $('.content-blog').html(($(data).find('.content-blog > ')));
            habilitaBotoes();
        },
        error:function(){
            console.log("Ocorreu um erro interno, tente novamente mais tarde ou abra um chamado");
        }
    });
}

function darkMode(){
    let buttonChange = $('.theme-button');
    let contents = $('body, .wrapthumbnail, .wrapcontent');

    buttonChange.click(() => {
        setDarkMode = localStorage.getItem('dark-theme');

        if (setDarkMode !== 'on') {
            contents.toggleClass('dark-theme');
            buttonChange.toggleClass('fa-toggle-on');

            setDarkMode = localStorage.setItem('dark-theme', 'on');
            setDarkMode = localStorage.setItem('fa-toggle-on', 'on');
        } else {
            contents.toggleClass('dark-theme');
            buttonChange.toggleClass('fa-toggle-on');

            setDarkMode = localStorage.setItem('dark-theme', null);
            setDarkMode = localStorage.setItem('fa-toggle-on', null);
        }
    });

    let setDarkMode = localStorage.getItem('dark-theme');
    if (setDarkMode === 'on') {
        contents.toggleClass('dark-theme');
        buttonChange.toggleClass('fa-toggle-on');
    }
}
