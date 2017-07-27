

$(document).ready(function() {
	// Модальные окна
	$(".modal-block").fancybox({padding: 0});

	// Якоря
    $(".anchor").click(function(e) {
        e.preventDefault();

        var scrollElement = $(this).attr("href");

        if ($(scrollElement).length != 0) {
            $("html, body").animate({scrollTop: $(scrollElement).offset().top}, 500);
        }
    });

	// Кнопка спойлера
	$(".spoiler-button").click(function() {
		if (!$(this).hasClass("collapsed")) {
			$(this).children(".icon").removeClass("icon-arrows-up");
			$(this).children(".icon").addClass("icon-arrows-down");
		}
		else {
			$(this).children(".icon").removeClass("icon-arrows-down");
			$(this).children(".icon").addClass("icon-arrows-up");
		}
	});

	// Слайдеры
	$(".offers-slider").owlCarousel({
		items: 4,
		responsive: {
		    0: {
		        items: 1
		    },
		    640: {
		    	items: 2
		    },
		    960: {
		    	items: 3
		    },
		    1200: {
		    	items: 4
		    }
		}
	});

	// // Навигация в отчете
	// var controller = new ScrollMagic.Controller();
	// new ScrollMagic.Scene({
	// 		duration: $(".report-wrapper").height() - 200,
	// 		offset: $(".header").height() + 40
	// 	}).setPin(".report-nav").addTo(controller);
});
