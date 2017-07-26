//get query parameters
var qp = {};
var __p = window.location.href.match(/\?(.+)$/);
if(__p!=null&&__p.length>1){
    var __a = __p[1].split(/\&/);
    for(var i in  __a){
        var nv = __a[i].split(/=/);
        qp[nv[0]] = decodeURIComponent(nv[1].replace(/\+/ig," "));
    }
}
// Metrics
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter44533300 = new Ya.Metrika({
                id:44533300,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true,
                trackHash:true
            });
            $("body").trigger("vb:metrikaLoaded");
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = "https://mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");


// var  siteLogo = null;
// getDataUri('/img/site_logo.png', function(dataUri) {
//     siteLogo = dataUri;
//     console.log("logo=" + siteLogo);
// });
//
// function getDataUri(url, cb){
//     var image = new Image();
//     image.setAttribute('crossOrigin', 'anonymous'); //getting images from external domain
//
//     image.onload = function () {
//         var canvas = document.createElement('canvas');
//         canvas.width = this.naturalWidth;
//         canvas.height = this.naturalHeight;
//
//         //next three lines for white background in case png has a transparent background
//         var ctx = canvas.getContext('2d');
//         ctx.fillStyle = '#fff';  /// set white fill style
//         ctx.fillRect(0, 0, canvas.width, canvas.height);
//         canvas.getContext('2d').drawImage(this, 0, 0);
//         cb(canvas.toDataURL('image/png'));
//     };
//     image.src = url;
// }

// Модальные окна
function openModal(modal) {
	$(".modal-window").fadeIn(400);

	$(".modal-window-wrapper").children().not(".close-button").fadeOut(0);
	$(".modal-window-overlay").height($(modal).height() + 100);
	$(modal).fadeIn(400);

	$("body").css("overflow", "hidden");
}
function closeModal() {
	$(".modal-window").fadeOut(400);
	$("body").css("overflow", "auto");
}
var putData = function(){
    var $content = (arguments.length)?arguments[0]:null, data = (arguments.length>1)?arguments[1]:null,s="",
        titles={
            "Модель":'<div style="position: absolute; margin-top: -1px;" class="schet_mobile"><img src="img/reports_icon/1.png" style="width:30px;"></div>',
            "VIN":'<div style="position: absolute; margin-top: 1px;" class="schet_mobile"><img src="img/reports_icon/2.png" style="width:30px;"></div>',
            "Год производства":'<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/3.png" style="width:30px;"></div>',
            "Цвет":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/4.png" style="width:30px;"></div>',
            "Мощность двигателя":'<div style="position: absolute; margin-top: -2px;" class="schet_mobile"><img src="img/reports_icon/5.png" style="width:30px;"></div>',
            "Объём двигателя":'<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/6.png" style="width:30px;"></div>',
            "Комплектация автомобиля":'<div style="position: absolute; margin-top: -7px;" class="schet_mobile"><img src="img/reports_icon/7.png" style="width:30px;"></div>',
            "Участие в ДТП":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/8.png" style="width:30px;"></div>',
            "Ограничения на регистрационные действия":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/9.png" style="width:30px;"></div>',
            "Проверка на нахождение в залоге":'<div style="position: absolute; margin-top: -3px;" class="schet_mobile"><img src="img/reports_icon/10.png" style="width:30px;"></div>',
            "Информация об угоне и розыске":'<div style="position: absolute; margin-top: -2px;" class="schet_mobile"><img src="img/reports_icon/11.png" style="width:30px;"></div>',
            "Пробег машины":'<div style="position: absolute; margin-top: -3px;" class="schet_mobile"><img src="img/reports_icon/12.png" style="width:30px;"></div>',
            "Количество владельцев ТС":'<div style="position: absolute; margin-top: -10px;" class="schet_mobile"><img src="img/reports_icon/13.png" style="width:30px;"></div>',
            "История регистрационных действий":'<div style="position: absolute; margin-top: -9px;" class="schet_mobile"><img src="img/reports_icon/14.png" style="width:30px;"></div>',
            "Сведения о страховке ОСАГО":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/15.png" style="width:30px;"></div>',
            "Информация о утилизации":'<div style="position: absolute; margin-top: -5px;" class="schet_mobile"><img src="img/reports_icon/16.png" style="width:30px;"></div>',
            "Статус владельца (физ / юр. лицо)":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/17.png" style="width:30px;"></div>',
            "Использование в качестве такси":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/18.png" style="width:30px;"></div>',
            "Таможенная история":'<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/19.png" style="width:30px;"></div>',
            "Сведения о покупке в лизинг":'<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/20.png" style="width:30px;"></div>'
        };
    if(data==null||$content==null)return;
    if(! $content instanceof jQuery) $content = $($content);
    if(!Array.isArray(data))data=[data];
    $content = $('<ul class="vin-report-list"></ul>').appendTo($content);
    for(var i in data){
        s = '<li class="vin-report-data">';
		if(typeof(data[i].value)!="undefined"){

			s+= titles[data[i].title]+'<span class="vin-report-data-title">'+data[i].title+'</span>';
	        s+= '<span class="vin-report-data-value '+((typeof(data[i].code)!="undefined")?data[i].code:'data-value')+'">'+data[i].value+'</span>';
		}
        else {
			s+= '<span class="vin-report-data-value single">'+data[i].title+'</span>';
		}
		if(typeof(data[i].hint)!="undefined") s+= '<span class="vin-report-data-hint">'+data[i].hint+'</span>';
        s+= '</li>';
        $content.append(s);
    }
}
var makePDF = function(id,e){
	$.ajax({
        method: "POST",
		url: "/pdf.php",
		data: {
            cb_order_id: id
		},
	}).done(function(data){console.log(data);});
}
$(document).ready(function() {
	// Мобильное меню
	$(".menu-button").click(function () {
		$(".site-nav-menu").slideToggle(300);
	});

    $(".open-modal").click(function (e) {
        e.preventDefault();
        openModal($(this).attr("data-modal"));

        if($(this).attr("data-modal") == "#modal3") {
            $(".close-button").hide();
        }
        else {
            $(".close-button").show();
        }
    });

    $(".modal-window-overlay, .close-button").click(function () {
    	if ($("#modal2").is(":hidden")) {
    		closeModal();
    	}
    	else {
    		return false;
    	}
    });

    // Переключатели инпутов
    var toggleInput = $(".toggle-input");

    for (i = 0; i < toggleInput.length; ++i) {
    	var toggleInputAttr = $(toggleInput[i]).attr("data-toggle");

    	if ($(toggleInput[i]).is(":checked")) {
    		$(toggleInputAttr).show();
    	}
    	else {
    		$(toggleInputAttr).hide();
    	}
    }

    $(".toggle-input").change(function() {
    	var toggleInputAttr = $(this).attr("data-toggle");

    	if ($(this).is(":checked")) {
    		$(toggleInputAttr).show();
    	}
    	else {
    		$(toggleInputAttr).hide();
    	}
    });


    // Якоря
    $("a[href^='#']").click(function(e) {
        e.preventDefault();

        var scrollElement = $(this).attr("href");

        if ($(scrollElement).length != 0) {
        	if($(scrollElement).parents(".modal-window").length > 0) {
	        	if ($(document).width() > 960) {
	            	$(".modal-window").animate({ scrollTop: $(scrollElement).offset().top }, 500);
	            }
	            else {
	            	$(".modal-window-wrapper").animate({ scrollTop: $(scrollElement).offset().top }, 500);
	            }
        	}
        	else {
        		$("html, body").animate({ scrollTop: $(scrollElement).offset().top }, 500);
        	}
        }
    });


    // Маски текстовых полей
    $("input[name=phone]").inputmask("+7 (999) 999-99-99", {showMaskOnHover: false});


	// Спойлеры
	$(".spoiler-button").click(function () {
		$(this).next(".spoiler-content").slideDown(300);
		$(this).hide();
	});


	// Форма обратной связи
    $(".contact-form form").on("submit", function(e) {
        e.preventDefault();
        var sformdata = $(this).serialize();
        console.debug(sformdata);
        $.ajax({
            type: "POST",
            url: "mail/mail.php",
            data: sformdata,
            success: function(responce) {
                closeModal();
                alert(responce);
            }
        });
    });
	$(".print").on("click",function(e){
		$(".modal-window").scrollTop(0);
		window.print();
	});

	$(".icon-close").on("click",function(){
		closeModal();
	});
    // metrics
    $("body > section.main > div > div > form > input.button.search").on("click",function(e){
        console.debug(yaCounter44533300,'verh-vin-enter clicked');
        yaCounter44533300.reachGoal('verh-vin-enter');
    });
    $("body > section.check > div > div > form > input.button.search").on("click",function(e){
        console.debug(yaCounter44533300,'niz-vin-enter clicked');
        yaCounter44533300.reachGoal('niz-vin-enter');
    });
    $("#buyForm > div > form > div.submit-wrapper.clearfix > div.payment-wrapper > input.payment-button").on("click",function(e){
        console.debug(yaCounter44533300,'oplata-perehod clicked');
        yaCounter44533300.reachGoal('oplata-perehod');
    });
    //
    //
    if(typeof(qp.example)!="undefined" && qp.example == "true"){
        openModal("#modal4")
    }
});
