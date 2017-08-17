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
                id:45236304,
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

    $content = $('<ul class="report-data"></ul>').appendTo($content);
    for(var i in data){
        s = '<li class="report-data-item">';
		if(typeof(data[i].value)!="undefined"){
			// s+= titles[data[i].title]+'<span class="report-data-title">'+data[i].title+'</span>';

	        // s+= '<span class="report-data-value '+((typeof(data[i].code)!="undefined")?data[i].code:'data-value')+'">'+data[i].value+'</span>';
            s+= '<h5 class="report-data-title">'+data[i].title+'</h5>';
	        s+= '<span class="report-data-value">'+data[i].value+'</span>';
		}
        else {
			s+= '<span class="report-data-value single">'+data[i].title+'</span>';
		}
		if(typeof(data[i].hint)!="undefined") s+= '<span class="report-data-hint">'+data[i].hint+'</span>';
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

$("body").on("vb:metrikaLoaded",function(){
    console.debug("vb:metrikaLoaded triggered");
    if(qp.payed=="1"){
        console.debug(window.yaCounter44533300,'oplata-done occurs');
        if(window.yaCounter44533300)yaCounter44533300.reachGoal('oplata-done');
    }
});
var wmiList = {
    "1B" : "Соединенные Штаты",
    "1C" : "Соединенные Штаты",
    "1D" : "Соединенные Штаты",
    "1E" : "Соединенные Штаты",
    "1F" : "Соединенные Штаты",
    "1G" : "Соединенные Штаты",
    "1H" : "Соединенные Штаты",
    "1I" : "Соединенные Штаты",
    "1J" : "Соединенные Штаты",
    "1K" : "Соединенные Штаты",
    "1L" : "Соединенные Штаты",
    "1M" : "Соединенные Штаты",
    "1N" : "Соединенные Штаты",
    "1O" : "Соединенные Штаты",
    "1P" : "Соединенные Штаты",
    "1Q" : "Соединенные Штаты",
    "1R" : "Соединенные Штаты",
    "1S" : "Соединенные Штаты",
    "1T" : "Соединенные Штаты",
    "1U" : "Соединенные Штаты",
    "1V" : "Соединенные Штаты",
    "1W" : "Соединенные Штаты",
    "1X" : "Соединенные Штаты",
    "1Y" : "Соединенные Штаты",
    "1Z" : "Соединенные Штаты",
    "11" : "Соединенные Штаты",
    "12" : "Соединенные Штаты",
    "13" : "Соединенные Штаты",
    "14" : "Соединенные Штаты",
    "15" : "Соединенные Штаты",
    "16" : "Соединенные Штаты",
    "17" : "Соединенные Штаты",
    "18" : "Соединенные Штаты",
    "19" : "Соединенные Штаты",
    "10" : "Соединенные Штаты",
    "2B" : "Канада",
    "2C" : "Канада",
    "2D" : "Канада",
    "2E" : "Канада",
    "2F" : "Канада",
    "2G" : "Канада",
    "2H" : "Канада",
    "2I" : "Канада",
    "2J" : "Канада",
    "2K" : "Канада",
    "2L" : "Канада",
    "2M" : "Канада",
    "2N" : "Канада",
    "2O" : "Канада",
    "2P" : "Канада",
    "2Q" : "Канада",
    "2R" : "Канада",
    "2S" : "Канада",
    "2T" : "Канада",
    "2U" : "Канада",
    "2V" : "Канада",
    "2W" : "Канада",
    "2X" : "Канада",
    "2Y" : "Канада",
    "2Z" : "Канада",
    "21" : "Канада",
    "22" : "Канада",
    "23" : "Канада",
    "24" : "Канада",
    "25" : "Канада",
    "26" : "Канада",
    "27" : "Канада",
    "28" : "Канада",
    "29" : "Канада",
    "20" : "Канада",
    "3B" : "Мексика",
    "3C" : "Мексика",
    "3D" : "Мексика",
    "3E" : "Мексика",
    "3F" : "Мексика",
    "3G" : "Мексика",
    "3H" : "Мексика",
    "3I" : "Мексика",
    "3J" : "Мексика",
    "3K" : "Мексика",
    "3L" : "Мексика",
    "3M" : "Мексика",
    "3N" : "Мексика",
    "3O" : "Мексика",
    "3P" : "Мексика",
    "3Q" : "Мексика",
    "3R" : "Мексика",
    "3S" : "Мексика",
    "3T" : "Мексика",
    "3U" : "Мексика",
    "3V" : "Мексика",
    "3W" : "Мексика",
    "3Y" : "Коста-Рика",
    "3Z" : "Коста-Рика",
    "31" : "Коста-Рика",
    "32" : "Коста-Рика",
    "33" : "Коста-Рика",
    "34" : "Коста-Рика",
    "35" : "Коста-Рика",
    "36" : "Коста-Рика",
    "37" : "Коста-Рика",
    "39" : "Каймановы острова",
    "30" : "Каймановы острова",
    "4B" : "Соединенные Штаты",
    "4C" : "Соединенные Штаты",
    "4D" : "Соединенные Штаты",
    "4E" : "Соединенные Штаты",
    "4F" : "Соединенные Штаты",
    "4G" : "Соединенные Штаты",
    "4H" : "Соединенные Штаты",
    "4I" : "Соединенные Штаты",
    "4J" : "Соединенные Штаты",
    "4K" : "Соединенные Штаты",
    "4L" : "Соединенные Штаты",
    "4M" : "Соединенные Штаты",
    "4N" : "Соединенные Штаты",
    "4O" : "Соединенные Штаты",
    "4P" : "Соединенные Штаты",
    "4Q" : "Соединенные Штаты",
    "4R" : "Соединенные Штаты",
    "4S" : "Соединенные Штаты",
    "4T" : "Соединенные Штаты",
    "4U" : "Соединенные Штаты",
    "4V" : "Соединенные Штаты",
    "4W" : "Соединенные Штаты",
    "4X" : "Соединенные Штаты",
    "4Y" : "Соединенные Штаты",
    "4Z" : "Соединенные Штаты",
    "41" : "Соединенные Штаты",
    "42" : "Соединенные Штаты",
    "43" : "Соединенные Штаты",
    "44" : "Соединенные Штаты",
    "45" : "Соединенные Штаты",
    "46" : "Соединенные Штаты",
    "47" : "Соединенные Штаты",
    "48" : "Соединенные Штаты",
    "49" : "Соединенные Штаты",
    "40" : "Соединенные Штаты",
    "5B" : "Соединенные Штаты",
    "5C" : "Соединенные Штаты",
    "5D" : "Соединенные Штаты",
    "5E" : "Соединенные Штаты",
    "5F" : "Соединенные Штаты",
    "5G" : "Соединенные Штаты",
    "5H" : "Соединенные Штаты",
    "5I" : "Соединенные Штаты",
    "5J" : "Соединенные Штаты",
    "5K" : "Соединенные Штаты",
    "5L" : "Соединенные Штаты",
    "5M" : "Соединенные Штаты",
    "5N" : "Соединенные Штаты",
    "5O" : "Соединенные Штаты",
    "5P" : "Соединенные Штаты",
    "5Q" : "Соединенные Штаты",
    "5R" : "Соединенные Штаты",
    "5S" : "Соединенные Штаты",
    "5T" : "Соединенные Штаты",
    "5U" : "Соединенные Штаты",
    "5V" : "Соединенные Штаты",
    "5W" : "Соединенные Штаты",
    "5X" : "Соединенные Штаты",
    "5Y" : "Соединенные Штаты",
    "5Z" : "Соединенные Штаты",
    "51" : "Соединенные Штаты",
    "52" : "Соединенные Штаты",
    "53" : "Соединенные Штаты",
    "54" : "Соединенные Штаты",
    "55" : "Соединенные Штаты",
    "56" : "Соединенные Штаты",
    "57" : "Соединенные Штаты",
    "58" : "Соединенные Штаты",
    "59" : "Соединенные Штаты",
    "50" : "Соединенные Штаты",
    "6B" : "Австралия",
    "6C" : "Австралия",
    "6D" : "Австралия",
    "6E" : "Австралия",
    "6F" : "Австралия",
    "6G" : "Австралия",
    "6H" : "Австралия",
    "6I" : "Австралия",
    "6J" : "Австралия",
    "6K" : "Австралия",
    "6L" : "Австралия",
    "6M" : "Австралия",
    "6N" : "Австралия",
    "6O" : "Австралия",
    "6P" : "Австралия",
    "6Q" : "Австралия",
    "6R" : "Австралия",
    "6S" : "Австралия",
    "6T" : "Австралия",
    "6U" : "Австралия",
    "6V" : "Австралия",
    "6W" : "Австралия",
    "7B" : "Новая Зеландия",
    "7C" : "Новая Зеландия",
    "7D" : "Новая Зеландия",
    "7E" : "Новая Зеландия",
    "8B" : "Аргентина",
    "8C" : "Аргентина",
    "8D" : "Аргентина",
    "8E" : "Аргентина",
    "8G" : "Чили",
    "8H" : "Чили",
    "8I" : "Чили",
    "8J" : "Чили",
    "8K" : "Чили",
    "8M" : "Эквадор",
    "8N" : "Эквадор",
    "8O" : "Эквадор",
    "8P" : "Эквадор",
    "8Q" : "Эквадор",
    "8R" : "Эквадор",
    "8T" : "Перу",
    "8U" : "Перу",
    "8V" : "Перу",
    "8W" : "Перу",
    "8Y" : "Венесуэла",
    "8Z" : "Венесуэла",
    "81" : "Венесуэла",
    "82" : "Венесуэла",
    "9B" : "Бразилия",
    "9C" : "Бразилия",
    "9D" : "Бразилия",
    "9E" : "Бразилия",
    "9G" : "Колумбия",
    "9H" : "Колумбия",
    "9I" : "Колумбия",
    "9J" : "Колумбия",
    "9K" : "Колумбия",
    "9M" : "Парагвай",
    "9N" : "Парагвай",
    "9O" : "Парагвай",
    "9P" : "Парагвай",
    "9Q" : "Парагвай",
    "9R" : "Парагвай",
    "9T" : "Тринидад и Тобаго",
    "9U" : "Тринидад и Тобаго",
    "9V" : "Тринидад и Тобаго",
    "9W" : "Тринидад и Тобаго",
    "9Y" : "Бразилия",
    "9Z" : "Бразилия",
    "91" : "Бразилия",
    "92" : "Бразилия",
    "AB" : "ЮАР",
    "AC" : "ЮАР",
    "AD" : "ЮАР",
    "AE" : "ЮАР",
    "AF" : "ЮАР",
    "AG" : "ЮАР",
    "AH" : "ЮАР",
    "BG" : "Кения",
    "BH" : "Кения",
    "BI" : "Кения",
    "BJ" : "Кения",
    "BK" : "Кения",
    "BM" : "Танзании",
    "BN" : "Танзании",
    "BO" : "Танзании",
    "BP" : "Танзании",
    "BQ" : "Танзании",
    "BR" : "Танзании",
    "CB" : "Бенин",
    "CC" : "Бенин",
    "CD" : "Бенин",
    "CE" : "Бенин",
    "CG" : "Мадагаскар",
    "CH" : "Мадагаскар",
    "CI" : "Мадагаскар",
    "CJ" : "Мадагаскар",
    "CK" : "Мадагаскар",
    "CM" : "Тунис",
    "CN" : "Тунис",
    "CO" : "Тунис",
    "CP" : "Тунис",
    "CQ" : "Тунис",
    "CR" : "Тунис",
    "DB" : "Египет",
    "DC" : "Египет",
    "DD" : "Египет",
    "DE" : "Египет",
    "DG" : "Марокко",
    "DH" : "Марокко",
    "DI" : "Марокко",
    "DJ" : "Марокко",
    "DK" : "Марокко",
    "DM" : "Замбия",
    "DN" : "Замбия",
    "DO" : "Замбия",
    "DP" : "Замбия",
    "DQ" : "Замбия",
    "DR" : "Замбия",
    "EB" : "Эфиопия",
    "EC" : "Эфиопия",
    "ED" : "Эфиопия",
    "EE" : "Эфиопия",
    "EG" : "Мозамбик",
    "EH" : "Мозамбик",
    "EI" : "Мозамбик",
    "EJ" : "Мозамбик",
    "EK" : "Мозамбик",
    "FB" : "Гана",
    "FC" : "Гана",
    "FD" : "Гана",
    "FE" : "Гана",
    "FM" : "Нигерия",
    "FN" : "Нигерия",
    "FO" : "Нигерия",
    "FP" : "Нигерия",
    "FQ" : "Нигерия",
    "FR" : "Нигерия",
    "FS" : "Нигерия",
    "FT" : "Нигерия",
    "FU" : "Нигерия",
    "FV" : "Нигерия",
    "FW" : "Нигерия",
    "FX" : "Нигерия",
    "FY" : "Нигерия",
    "FZ" : "Нигерия",
    "F1" : "Нигерия",
    "F2" : "Нигерия",
    "F3" : "Нигерия",
    "F4" : "Нигерия",
    "F5" : "Нигерия",
    "F6" : "Нигерия",
    "F7" : "Нигерия",
    "F8" : "Нигерия",
    "F9" : "Нигерия",
    "F0" : "Нигерия",
    "JB" : "Япония",
    "JC" : "Япония",
    "JD" : "Япония",
    "JE" : "Япония",
    "JF" : "Япония",
    "JG" : "Япония",
    "JH" : "Япония",
    "JI" : "Япония",
    "JJ" : "Япония",
    "JK" : "Япония",
    "JL" : "Япония",
    "JM" : "Япония",
    "JN" : "Япония",
    "JO" : "Япония",
    "JP" : "Япония",
    "JQ" : "Япония",
    "JR" : "Япония",
    "JS" : "Япония",
    "JT" : "Япония",
    "KB" : "Шри-Ланка",
    "KC" : "Шри-Ланка",
    "KD" : "Шри-Ланка",
    "KE" : "Шри-Ланка",
    "KG" : "Израиль",
    "KH" : "Израиль",
    "KI" : "Израиль",
    "KJ" : "Израиль",
    "KK" : "Израиль",
    "KM" : "Южная Корея",
    "KN" : "Южная Корея",
    "KO" : "Южная Корея",
    "KP" : "Южная Корея",
    "KQ" : "Южная Корея",
    "KR" : "Южная Корея",
    "LB" : "Тайвань - Китай",
    "LC" : "Тайвань - Китай",
    "LD" : "Тайвань - Китай",
    "LE" : "Тайвань - Китай",
    "LF" : "Тайвань - Китай",
    "LG" : "Тайвань - Китай",
    "LH" : "Тайвань - Китай",
    "LI" : "Тайвань - Китай",
    "LJ" : "Тайвань - Китай",
    "LK" : "Тайвань - Китай",
    "LL" : "Тайвань - Китай",
    "LM" : "Тайвань - Китай",
    "LN" : "Тайвань - Китай",
    "LO" : "Тайвань - Китай",
    "LP" : "Тайвань - Китай",
    "LQ" : "Тайвань - Китай",
    "LR" : "Тайвань - Китай",
    "LS" : "Тайвань - Китай",
    "LT" : "Тайвань - Китай",
    "LU" : "Тайвань - Китай",
    "LV" : "Тайвань - Китай",
    "LW" : "Тайвань - Китай",
    "LX" : "Тайвань - Китай",
    "LY" : "Тайвань - Китай",
    "LZ" : "Тайвань - Китай",
    "L1" : "Тайвань - Китай",
    "L2" : "Тайвань - Китай",
    "L3" : "Тайвань - Китай",
    "L4" : "Тайвань - Китай",
    "L5" : "Тайвань - Китай",
    "L6" : "Тайвань - Китай",
    "L7" : "Тайвань - Китай",
    "L8" : "Тайвань - Китай",
    "L9" : "Тайвань - Китай",
    "L0" : "Тайвань - Китай",
    "MB" : "Индия",
    "MC" : "Индия",
    "MD" : "Индия",
    "ME" : "Индия",
    "MG" : "Индонезия",
    "MH" : "Индонезия",
    "MI" : "Индонезия",
    "MJ" : "Индонезия",
    "MK" : "Индонезия",
    "MM" : "Таиланд",
    "MN" : "Таиланд",
    "MO" : "Таиланд",
    "MP" : "Таиланд",
    "MQ" : "Таиланд",
    "MR" : "Таиланд",
    "NG" : "Пакистан",
    "NH" : "Пакистан",
    "NI" : "Пакистан",
    "NJ" : "Пакистан",
    "NK" : "Пакистан",
    "NL" : "Турция",
    "NM" : "Турция",
    "NN" : "Турция",
    "NO" : "Турция",
    "NP" : "Турция",
    "NQ" : "Турция",
    "NR" : "Турция",
    "PB" : "Филиппины",
    "PC" : "Филиппины",
    "PD" : "Филиппины",
    "PE" : "Филиппины",
    "PG" : "Сингапур",
    "PH" : "Сингапур",
    "PI" : "Сингапур",
    "PJ" : "Сингапур",
    "PK" : "Сингапур",
    "PM" : "Малайзия",
    "PN" : "Малайзия",
    "PO" : "Малайзия",
    "PP" : "Малайзия",
    "PQ" : "Малайзия",
    "PR" : "Малайзия",
    "RB" : "Объединенные Арабские Эмираты",
    "RC" : "Объединенные Арабские Эмираты",
    "RD" : "Объединенные Арабские Эмираты",
    "RE" : "Объединенные Арабские Эмираты",
    "RG" : "Тайвань",
    "RH" : "Тайвань",
    "RI" : "Тайвань",
    "RJ" : "Тайвань",
    "RK" : "Тайвань",
    "RM" : "Вьетнам",
    "RN" : "Вьетнам",
    "RO" : "Вьетнам",
    "RP" : "Вьетнам",
    "RQ" : "Вьетнам",
    "RR" : "Вьетнам",
    "SB" : "Великобритания",
    "SC" : "Великобритания",
    "SD" : "Великобритания",
    "SE" : "Великобритания",
    "SF" : "Великобритания",
    "SG" : "Великобритания",
    "SH" : "Великобритания",
    "SI" : "Великобритания",
    "SJ" : "Великобритания",
    "SK" : "Великобритания",
    "SL" : "Великобритания",
    "SM" : "Великобритания",
    "SO" : "Германия",
    "SP" : "Германия",
    "SQ" : "Германия",
    "SR" : "Германия",
    "SS" : "Германия",
    "ST" : "Германия",
    "SV" : "Польша",
    "SW" : "Польша",
    "SX" : "Польша",
    "SY" : "Польша",
    "SZ" : "Польша",
    "S2" : "Латвия",
    "S3" : "Латвия",
    "S4" : "Латвия",
    "TB" : "Швейцария",
    "TC" : "Швейцария",
    "TD" : "Швейцария",
    "TE" : "Швейцария",
    "TF" : "Швейцария",
    "TG" : "Швейцария",
    "TH" : "Швейцария",
    "TI" : "Чехия",
    "TK" : "Чехия",
    "TL" : "Чехия",
    "TM" : "Чехия",
    "TN" : "Чехия",
    "TO" : "Чехия",
    "TP" : "Чехия",
    "TS" : "Венгрия",
    "TT" : "Венгрия",
    "TU" : "Венгрия",
    "TV" : "Венгрия",
    "TX" : "Португалия",
    "TY" : "Португалия",
    "TZ" : "Португалия",
    "T1" : "Португалия",
    "UF" : "Дания",
    "UI" : "Дания",
    "UJ" : "Дания",
    "UK" : "Дания",
    "UL" : "Дания",
    "UM" : "Дания",
    "UO" : "Ирландия",
    "UP" : "Ирландия",
    "UQ" : "Ирландия",
    "UR" : "Ирландия",
    "US" : "Ирландия",
    "UT" : "Ирландия",
    "UV" : "Румыния",
    "UW" : "Румыния",
    "UX" : "Румыния",
    "UY" : "Румыния",
    "UZ" : "Румыния",
    "U6" : "Словакия",
    "U7" : "Словакия",
    "U9" : "Словакия",
    "U0" : "Словакия",
    "VB" : "Австрия",
    "VC" : "Австрия",
    "VD" : "Австрия",
    "VE" : "Австрия",
    "VF" : "Франция",
    "VG" : "Франция",
    "VH" : "Франция",
    "VI" : "Франция",
    "VJ" : "Франция",
    "VK" : "Франция",
    "VL" : "Франция",
    "VM" : "Франция",
    "VN" : "Франция",
    "VO" : "Франция",
    "VP" : "Франция",
    "VQ" : "Франция",
    "VR" : "Франция",
    "VT" : "Испания",
    "VU" : "Испания",
    "VV" : "Испания",
    "VW" : "Испания",
    "VY" : "Сербия",
    "VZ" : "Сербия",
    "V1" : "Сербия",
    "V2" : "Сербия",
    "V4" : "Хорватия",
    "V5" : "Хорватия",
    "V7" : "Эстония",
    "V8" : "Эстония",
    "V9" : "Эстония",
    "V0" : "Эстония",
    "WB" : "Германия",
    "WC" : "Германия",
    "WD" : "Германия",
    "WE" : "Германия",
    "WF" : "Германия",
    "WG" : "Германия",
    "WH" : "Германия",
    "WI" : "Германия",
    "WJ" : "Германия",
    "WK" : "Германия",
    "WL" : "Германия",
    "WM" : "Германия",
    "WN" : "Германия",
    "WO" : "Германия",
    "WP" : "Германия",
    "WQ" : "Германия",
    "WR" : "Германия",
    "WS" : "Германия",
    "WT" : "Германия",
    "WU" : "Германия",
    "WV" : "Германия",
    "WW" : "Германия",
    "WX" : "Германия",
    "WY" : "Германия",
    "WZ" : "Германия",
    "W1" : "Германия",
    "W2" : "Германия",
    "W3" : "Германия",
    "W4" : "Германия",
    "W5" : "Германия",
    "W6" : "Германия",
    "W7" : "Германия",
    "W8" : "Германия",
    "W9" : "Германия",
    "W0" : "Германия",
    "XB" : "Болгария",
    "XC" : "Болгария",
    "XD" : "Болгария",
    "XE" : "Болгария",
    "XG" : "Греция",
    "XH" : "Греция",
    "XI" : "Греция",
    "XJ" : "Греция",
    "XK" : "Греция",
    "XM" : "Нидерланды",
    "XN" : "Нидерланды",
    "XO" : "Нидерланды",
    "XP" : "Нидерланды",
    "XQ" : "Нидерланды",
    "XR" : "Нидерланды",
    "XT" : "СССР (СНГ)",
    "XU" : "СССР (СНГ)",
    "XV" : "СССР (СНГ)",
    "XW" : "СССР (СНГ)",
    "XY" : "Люксембург",
    "XZ" : "Люксембург",
    "X1" : "Люксембург",
    "X2" : "Люксембург",
    "X4" : "Россия",
    "X5" : "Россия",
    "X6" : "Россия",
    "X7" : "Россия",
    "X8" : "Россия",
    "X9" : "Россия",
    "X0" : "Россия",
    "YB" : "Бельгия",
    "YC" : "Бельгия",
    "YD" : "Бельгия",
    "YE" : "Бельгия",
    "YG" : "Финляндия",
    "YH" : "Финляндия",
    "YI" : "Финляндия",
    "YJ" : "Финляндия",
    "YK" : "Финляндия",
    "YM" : "Мальта",
    "YN" : "Мальта",
    "YO" : "Мальта",
    "YP" : "Мальта",
    "YQ" : "Мальта",
    "YR" : "Мальта",
    "YT" : "Швеция",
    "YU" : "Швеция",
    "YV" : "Швеция",
    "YW" : "Швеция",
    "YY" : "Норвегия",
    "YZ" : "Норвегия",
    "Y1" : "Норвегия",
    "Y2" : "Норвегия",
    "Y4" : "Белоруссия",
    "Y5" : "Белоруссия",
    "Y7" : "Украина",
    "Y8" : "Украина",
    "Y9" : "Украина",
    "Y0" : "Украина",
    "ZB" : "Италия",
    "ZC" : "Италия",
    "ZD" : "Италия",
    "ZE" : "Италия",
    "ZF" : "Италия",
    "ZG" : "Италия",
    "ZH" : "Италия",
    "ZI" : "Италия",
    "ZJ" : "Италия",
    "ZK" : "Италия",
    "ZL" : "Италия",
    "ZM" : "Италия",
    "ZN" : "Италия",
    "ZO" : "Италия",
    "ZP" : "Италия",
    "ZQ" : "Италия",
    "ZR" : "Италия",
    "ZY" : "Словения",
    "ZZ" : "Словения",
    "Z1" : "Словения",
    "Z2" : "Словения",
    "Z4" : "Литва",
    "Z5" : "Литва",
    "Z8" : "Россия",
    "Z9" : "Россия",
    "Z0" : "Россия"
};
var getCountry=function(){
    if(!arguments.length)return "";
    var wmi = arguments[0];
    if(wmi.length>2)wmi=wmi.substr(0,2);
    console.debug(wmi,wmiList[wmi]);
    return wmiList[wmi];
};
var getCategory = function(){
    if(!arguments.length)return "-";
    switch(arguments[0]){
        case "А": return "Мотоциклы";
        case "А1": return "Легкие мотоциклы";
        case "В": return "Легковые автомобили, небольшие грузовики (до 3,5 тонн)";
        case "ВE": return "Легковые автомобили с прицепом";
        case "В1": return "Трициклы";
        case "С": return "Грузовые автомобили (от 3,5 тонн)";
        case "СE": return "Грузовые автомобили с прицепом";
        case "С1": return "Средние грузовики (от 3,5 до 7,5 тонн)";
        case "С1E": return "Средние грузовики с прицепом";
        case "D": return "Автобусы";
        case "DE": return "Автобусы с прицепом";
        case "D1": return "Небольшие автобусы";
        case "D1E": return "Небольшие автобусы с прицепом";
        case "М": return "Мопеды";
        case "Tm": return "Трамваи";
        case "Tb": return "Троллейбусы";
    }
    return "-";
}
var getFullReport = function(d){
    var formatDate=function(to){
        //"$(".request-status-timer").text(cv);"
        var cdate = new Date(to);
        var cday={
            year:cdate.getFullYear(),
            month:(cdate.getMonth()+1<10)?"0"+(cdate.getMonth()+1):cdate.getMonth()+1,
            day:(cdate.getDate()<10)?"0"+cdate.getDate():cdate.getDate(),
            toString:function(){
                var f = arguments.length?arguments[0]:0;
                switch(f){
                    case 0: return this.year+'/'+this.month+'/'+this.day;
                }
            }
        };
        return cday.toString();
    }, cati=1,container = $(".vin-report"),
        nomail = (arguments.length>1 && arguments[1]==="true")?true:false,
        example = (arguments.length>2 && arguments[2]==="true")?true:false,
        organs =[
                "не предусмотренный код",
                "Судебные органы",
                "Судебный пристав",
                "Таможенные органы",
                "Органы социальной защиты",
                "Нотариус",
                "ОВД или иные правоохр. органы",
                "ОВД или иные правоохр. органы (прочие)"
            ],
            ogr = [
                "",
                "Запрет на регистрационные действия",
                "Запрет на снятие с учета",
                "Запрет на регистрационные действия и прохождение ГТО",
                "Утилизация (для транспорта не старше 5 лет)",
                "Аннулирование"
            ];
    $(".questions").hide();
    container.html('');
    container.append('<div class="section-header"><h4 class="section-headline">Полный отчет</h4></div>');
    $c = $('<div class="section-content"></div>').appendTo(container);
    // $c.append('<div class="report-buttons"><a class="button rounded" href="#buyForm"><span class="icon icon-doc"></span>Рекомендуем получить полный отчет</a></div>');
    $c.append('<div class="report-buttons"><a class="button rounded print" href="#"><span class="icon icon-print"></span>Версия для печати</a><a class="button rounded pdf" href="#"><span class="icon icon-pdf"></span>PDF для печати</a></div>');
    $c.append('<span class="checkable-vin">'+qp.vin+'</span>');
    $cu = $('<ul class="report-wrapper"></ul>').appendTo($c);


    if(d.history != null){$(".modal-window-title").html((example)?"Пример полного отчёта по VIN коду - "+d.history.RequestResult.vehicle.vin:"Получен полный отчёт по VIN коду - "+d.history.RequestResult.vehicle.vin);}

    if(d.history != null){
        $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);
        $cc.append('<h4 class="report-category-title">Общие сведения об автомобиле</h4>');
        putData($cc,[
            {title:"Модель",code:"vehicle-model",value:d.history.RequestResult.vehicle.model},
            {title:"VIN",code:"vehicle-vin",value:d.history.RequestResult.vehicle.vin},
            {title:"Год производства",code:"vehicle-year",value:d.history.RequestResult.vehicle.year},
            {title:"Цвет",code:"vehicle-color",value:d.history.RequestResult.vehicle.color},
            {title:"Мощность двигателя",code:"vehicle-powerHp",value:parseFloat(d.history.RequestResult.vehicle.powerHp).toFixed(0)+" л.с."},
            {title:"Объём двигателя",code:"vehicle-engineVolume",value:parseFloat(d.history.RequestResult.vehicle.engineVolume).toFixed(0)+" куб. см."},
            {title:"Тип",code:"vehicle-category",value:getCategory(d.history.RequestResult.vehicle.category)}
        ]);

        $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);
        $cc.append('<h4 class="report-category-title">Данные таможни</h4>');
        putData($cc,[
            {title:"Дата декларации",code:"customs-date",value:d.history.RequestResult.vehicle.year},
            // {title:"Выдан",code:"customs-issue",value:d.history.RequestResult.vehiclePassport.issue},
            // {title:"Номер документа",code:"customs-number",value:d.history.RequestResult.vehiclePassport.number},
            {title:"Страна вывоз",code:"customs-country",value:getCountry(qp.vin)}
        ]);
    }
    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Данные ОСАГО</h4>');
    if(d.rca!=null && d.rca.policyResponseUIItems!=null){
        putData($cc,[
            {title:"Дата запроса действительности полиса",code:"osago-date",value:formatDate(new Date())},
            {title:"Серия договора",code:"osago-policyBsoSerial",value:d.rca.policyResponseUIItems[0].policyBsoSerial},
            {title:"Номер договора",code:"osago-policyBsoNumber",value:d.rca.policyResponseUIItems[0].policyBsoNumber},
            {title:"Ограничения лиц допущенных к управлению ТС",code:"osago-policyIsRestrict",value:(d.rca.policyResponseUIItems[0].policyIsRestrict=="1")?"С ограничениями":"Без ограничений"},
            {title:"Страховая компания",code:"osago-insCompanyName",value:d.rca.policyResponseUIItems[0].insCompanyName},

        ]);
    }else{
        putData($cc,[{title:"Данные о полисе ОСАГО не загеристрированы на данное ТС"}]);
    }

    var osagoPrice = (typeof(d.osago)!="undefined" && typeof(d.osago.price)!="undefined")?parseFloat(d.osago.price).toFixed(2):'';
    putData($cc,[{title:"Примерная стоимость ОСАГО на 1 год",code:"osago-price",value:osagoPrice+'<a class="button" href="http://cars-bazar.ru/uslugi/osago/" target="_blank">Купить ОСАГО</a>'}]);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Рыночная стоимость</h4>');
    // container.append('<h5 class="report-data-category" style="background-color:#19b689;">Рыночная стоимость</h5>');
    var val =(typeof(d.carprice)!="undefined" && d.carprice!=null && typeof(d.carprice.car_price_from)!="undefined")
        ?"от "+d.carprice.car_price_from+" до "+d.carprice.car_price
        :"Не определено";
    putData($cc,[{title:"Примерная стоимость",value:val}]);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Пробег автомобиля</h4>');
    putData($cc,[
        {title:"Значение",value:"Данные не зафиксированы",code:"data-value"}
    ]);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Сведения об участии в ДТП</h4>');
    if(d.dtp!=null && typeof(d.dtp)!="undefined"&& typeof(d.dtp.RequestResult)!="undefined" && d.dtp.RequestResult.Accidents.length){
        var dtp = [];
        for(var i in d.dtp.RequestResult.Accidents){
            dtp.push(
                {title:"Информация о ДТП №"+d.dtp.RequestResult.Accidents[i].AccidentNumber},
                {title:"Тип ДТП",value:d.dtp.RequestResult.Accidents[i].AccidentType},
                {title:"Место ДТП",value:d.dtp.RequestResult.Accidents[i].RegionName},
                {title:"Время ДТП",value:d.dtp.RequestResult.Accidents[i].AccidentDateTime},
                {title:"Марка (модель) ТС",value:d.dtp.RequestResult.Accidents[i].VehicleMark+" ("+d.dtp.RequestResult.Accidents[i].VehicleModel+")"},
                {title:"Статус",value:d.dtp.RequestResult.Accidents[i].VehicleDamageState+" "+d.dtp.RequestResult.Accidents[i].DamagePoints.join(', ')},
                {title:"Год выпуска ТС",value:d.dtp.RequestResult.Accidents[i].VehicleYear}
            );
        }
        putData($cc,dtp);
    }
    else {
        putData($cc,[
            {title:"Данные не зафиксированы",hint:'Мы не смогли найти факты, которые указывают на наличие ДТП.<br>Тем не менее, это не означает, что данный автомобиль НЕ УЧАСТВОВАЛ в ДТП'}
        ]);
    }
    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Количество владельцев</h4>');
    putData($cc,{title:"Владельцев",value:d.history.RequestResult.ownershipPeriods.ownershipPeriod.length});

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">История регистрационных действий</h4>');
    var owners = [];
    for(var i in d.history.RequestResult.ownershipPeriods.ownershipPeriod){
        var to = d.history.RequestResult.ownershipPeriods.ownershipPeriod[i].to;
        if(typeof(to)=="undefined")to = "По текущий момент";
        else to = formatDate(to);
        owners.push({title:"Дата последней операции",value:to});
    }
    putData($cc,owners);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Информация о розыске ТС, в системе МВД России</h4>');
    var wanted = [{title:"ГИБДД подтвердило, что автомобиль не числится в угоне"}];
    if(d.wanted!=null && typeof(d.wanted)!="undefined"&& typeof(d.wanted.RequestResult)!="undefined" && d.wanted.RequestResult.count>0){wanted = [];}
    putData($cc,wanted);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Информация о наложении ограничений в Госавтоинспекции на ТС</h4>');
    var dd = [{title:"Ограничений нет (проверено в ГИБДД)"}];
    if(d.restrict!=null && typeof(d.restrict)!="undefined"&& typeof(d.restrict.RequestResult)!="undefined" && d.restrict.RequestResult.count>0){
        dd=[];
        var restrictedItems = d.restrict.RequestResult.records;
        for (var key in restrictedItems) {
            // var osnOgr = getText(restrictedItems[key].osnOgr, 'н.д.');
            // osnOgr = setLinkToIp(osnOgr);
            dd.push({title:"Информация об ограничении "+restrictedItems[key].gid});
            dd.push({title:"Марка (модель) ТС",value:restrictedItems[key].tsmodel});
            dd.push({title:"Год выпуска ТС",value:(restrictedItems[key].tsyear === null)?'-':restrictedItems[key].tsyear + '&nbsp;г.'});
            dd.push({title:"Дата наложения ограничения",value:restrictedItems[key].dateogr});
            dd.push({title:"Регион инициатора ограничения",value:restrictedItems[key].regname});
            dd.push({title:"Кем наложено ограничение",value:organs[restrictedItems[key].divtype]});
            dd.push({title:"Вид ограничения",value:ogr[restrictedItems[key].ogrkod]});
            dd.push({title:"Основания ограничения",value:restrictedItems[key].osnOgr});
        }
    }
    putData($cc,dd);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Утилизация</h4>');
    putData($cc,[{title:'Автомобиль не был утилизирован (Проверено в ГИБДД)'}]);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Использование автомобиля в качестве такси</h4>');
    putData($cc,[{title:'На автомобиль не выдавалась лицензия на такси'}]);

    $cc = $('<li id="report-category-'+(cati++)+'" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Информация о нахождении в залоге у банков</h4>');
    var zal = [{title:'Данный автомобиль не числится в залоге'}];
    if(d.zalog!=null){
        if(typeof(d.zalog.list)!="undefined"){
            zal = [];
            for(var i in d.zalog.list){
                var zl = d.zalog.list[i],props = [],debitors =[],creditors=[];
                for(var j in zl.properties)props.push(zl.properties[j].prefix+": "+zl.properties[j].value);
                for(var j in zl.pledgors)debitors.push((zl.pledgors[j].type=="person")?zl.pledgors[j].name+" ("+zl.pledgors[j].birth+")":zl.pledgors[j].name);
                for(var j in zl.pledgees)creditors.push((zl.pledgees[j].type=="person")?zl.pledgees[j].name+" ("+zl.pledgees[j].birth+")":zl.pledgees[j].name);

                zal.push({title:"Дата регистрации",value:zl.registerDate});
                zal.push({title:"Номер уведомления",value:zl.referenceNumber});
                zal.push({title:"Имущество",value:props.join(', ')});
                zal.push({title:"Залогодержатель",value:debitors.join(', ')});
                zal.push({title:"Залогодатель",value:creditors.join(', ')});
            }
        }
        else zal = [{title:'Нет данных о залоге данного автомобиля'}];

    }
    putData($cc,zal);
    $c.append('<div class="report-buttons"><a class="button rounded print" href="#"><span class="icon icon-print"></span>Версия для печати</a><a class="button rounded pdf" href="#"><span class="icon icon-pdf"></span>PDF для печати</a></div>');

    $(".promo").show();
    //makePDF(siteLogo,qp.vin,qp.email);
    //send mail
    var oid = qp.cb_order_id;
    oid = (typeof(oid)!="undefined")?oid:d.order.id;
    oid = (typeof(oid)!="undefined")?oid:$("[name=cb_order_id]").val();
    if(!nomail){
        $.ajax({
            url:"/mail/email.php",
            dataType:"json",
            data:{
                cb_order_id:oid,
                vin:d.history.RequestResult.vehicle.vin
            },
            success:function(d){
                console.debug(d);
            }
        });
    }
    $.ajax({
        url:"/pdf.php",
        dataType:"json",
        data:{
            cb_order_id:oid//vin:d.history.RequestResult.vehicle.vin
        },
        success:function(d){
            console.debug("pdf loaded");
        }
    });
    $(".pdf").on("click",function(e){
	    window.open("pdf.php?cb_order_id="+oid,"__blank");
	});
    $(".print").on("click",function(e){
		window.print();
	});
};
var validateVin = function(vin){
    var get_check_digit = function(vin) {
        var map = '0123456789X';
        var weights = '8765432X098765432';
        var sum = 0;
        var transliterate =function(c) {return '0123456789.ABCDEFGH..JKLMN.P.R..STUVWXYZ'.indexOf(c) % 10;};
        for (var i = 0; i < 17; ++i) sum += transliterate(vin[i]) * map.indexOf(weights[i]);
        return map[sum % 11];
    }
    if (vin.length !== 17) return false;
    return get_check_digit(vin) === vin[8];
};

$(document).ready(function(){
    $(".modal-block").on("click",function(){
        $("[name=packet]").val($(this).closest(".offer-title").html());
    });
    $(".pdf").on("click",function(e){
		//makePDF(siteLogo,qp.vin);
        var oid = qp.cb_order_id;
        oid = (typeof(oid)!="undefined")?oid:$("[name=cb_order_id]").val();
        window.open("pdf.php?cb_order_id="+oid,"__blank");
	});

    if(typeof(qp.vin)!="undefined"){
        var timerId,d={
            promo:(typeof(qp.promo)!="undefined")?qp.promo:"",
            email:(typeof(qp.email)!="undefined")?qp.email:"",
            vin:(typeof(qp.vin)!="undefined")?qp.vin:"",
            type:(typeof(qp.type)!="undefined")?qp.type:"small"
        };

        $.ajax({
            url:"report.php",
            dataType:"json",
            data:d,
            beforeSend:function(){
                $(".vin-report").html('');
                $(".vin-report").append('<div class="section-header"><h4 class="section-headline">Ваш отчёт по VIN коду - '+qp.vin+' подготавливается</h4></div>');
                $c = $('<div class="section-content"></div>').appendTo(".vin-report");
                $c.append('<span class="checkable-vin">Пожалуйста подождите, идет обработка запроса...<br/>Ожидаемое время формирования через: <span class="request-status-timer">45</span> секунд.</span>');
                $("#buyForm").hide();
                // $("#open_waitreport").click();
                //$(".request-status-title").html((typeof(qp.type)!="undefined"&&qp.type=="full")?"":"");
                // $("#waitreport .modal-window-headline").text('');
                // $("#waitreport .modal-window-content").html('Пожалуйста подождите, идет обработка запроса.<br />Ожидаемое время формирования через: <span class="request-status-timer">45</span> секунд.');
                // openModal("#waitreport");
                timerId = setInterval(function(){
                    var cv =parseInt($(".request-status-timer").text());
                    cv--;
                    $(".request-status-timer").text(cv);
                    if(cv == 0 ){
                        $(".checkable-vin").html('<span class="modal-window-text">"В данный момент очень много запросов к нашей системе.<br />Пожалуй, нам нужно еще <span class="request-status-timer">30</span> секунд.</span>')
                    }

                },1000);
            },
            success:function(d){
                try{
                    var order = (typeof(d.order)=="undefined")?{id:1}:d.order;
                    //console.debug(d,order,$("[name=cb_order_id]").val());
                    $("[name=cb_order_id]").val(order.id);
                    $("[name=vin]").val(qp.vin);
                    if(d.status=="notpayed"){
                        $(".checkable-vin").html('<span class="modal-window-text">Полный отчёт по VIN коду - <b>'+qp.vin+'</b>, не оплачен.</span>');
                        return;
                    }
                    else if(d.status=="notfound"){
                        $(".checkable-vin").html('<span class="modal-window-text">Данный VIN код - <b>'+qp.vin+'</b>, не числится в Базе Данных ГИБДД.</span>');
                        return;
                    }
                    if(typeof(d.history)!="undefined" && d.history!=null && d.history.status == "404"){
                        $(".checkable-vin").html('<span class="modal-window-text">Данный VIN код - <b>'+qp.vin+'</b>, не числится в Базе Данных ГИБДД.</span>');
                        return;
                    }
                    else if(typeof(d.history)!="undefined" && d.history!=null && d.history.status != "200"){
                        $(".checkable-vin").html('<span class="modal-window-text">В данный момент web ресурс ГИБДД не отвечает!<br/>Вы указали Ваш email, мы вышлем Вам отчет, когда ГИБДД свнова заработают.</span>');
                        return;
                    }
                    if(d.status=="partly")return;
                    else if(d.status=="small"){
                        $("#report-nav").addClass("locked").prepend('<div class="locked-nav"><span class="icon icon-lock-lg"></span><span class="locked-nav-text">Все данные доступны в полном отчете</span></div>');
                        $(".vin-report").html('');
                        $(".vin-report").append('<div class="section-header"><h4 class="section-headline">Краткий отчет</h4></div>');
                        $c = $('<div class="section-content"></div>').appendTo(".vin-report");
                        $c.append('<div class="report-buttons"><a class="button rounded" href="#buyForm"><span class="icon icon-doc"></span>Рекомендуем получить полный отчет</a></div>');
                        $c.append('<span class="checkable-vin">'+qp.vin+'</span>');
                        $cu = $('<ul class="report-wrapper"></ul>').appendTo($c);
                        $cc = $('<li class="report-category"></li>').appendTo($cu);
                        $cc.append('<h4 class="report-category-title">Общие сведения об автомобиле</h4>');
                        /*
                                <li class="report-data-item">
                                    <h5 class="report-data-title">Цвет</h5>
                                    <span class="report-data-value">
                                        <span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span>
                                    </span>
                                </li>
                                <li class="report-data-item">
                                    <h5 class="report-data-title">Комплектация</h5>
                                    <span class="report-data-value">
                                        <span class="locked-data">
                                            <span class="icon icon-lock"></span>
                                            Доступно в полном отчёте
                                        </span>
                                    </span>
                                </li>
                        */
                        putData($cc,[
                            {
                                title:"Модель",
                                code:"vehicle-model",
                                value:d.history.RequestResult.vehicle.model
                            },
                            {
                                title:"VIN",
                                code:"vehicle-vin",
                                value:d.history.RequestResult.vehicle.vin
                            },
                            {
                                title:"Год производства",
                                code:"vehicle-year",
                                value:d.history.RequestResult.vehicle.year
                            },
                            {title:"Цвет",code:"vehicle-color",value:d.history.RequestResult.vehicle.color},

                            // {title:"Цвет",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                            {
                                title:"Мощность двигателя",
                                code:"vehicle-powerHp",
                                value:parseFloat(d.history.RequestResult.vehicle.powerHp).toFixed(0)+" л.с."
                            },
                            {
                                title:"Объём двигателя",
                                code:"vehicle-engineVolume",
                                value:parseFloat(d.history.RequestResult.vehicle.engineVolume).toFixed(0)+" куб. см."
                            },
                            {title:"Тип",code:"vehicle-category",value:getCategory(d.history.RequestResult.vehicle.category)}
                            // {title:"Комплектация автомобиля",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"}
                        ]);
                        $cu.append('<li class="report-category"><h4 class="report-category-title">Данные таможни</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Дата декларации</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Страна вывоз</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Данные ОСАГО</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Дата запроса действительности полиса</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Серия договора</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Номер договора</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Ограничения лиц допущенных к управлению ТС</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Страховая компания</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Примерная стоимость ОСАГО на 1 год</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Пробег автомобиля</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Значение</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li>');

                        $cc = $('<li id="report-category-5" class="report-category"></li>').appendTo($cu);$cc.append('<h4 class="report-category-title">Сведения об участии в ДТП</h4>');
                        if(d.dtp!=null && typeof(d.dtp)!="undefined"&& typeof(d.dtp.RequestResult)!="undefined" && d.dtp.RequestResult.Accidents.length){
                            putData($cc,[{title:"В ГИБДД имеются сведения о ДТП с участием этого авто. Рекомендуем получить полный отчет."}]);
                            // var dtp = [];
                            // for(var i in d.dtp.RequestResult.Accidents){
                            //     dtp.push(
                            //         {title:"Информация о ДТП №"+d.dtp.RequestResult.Accidents[i].AccidentNumber},
                            //         {title:"Тип ДТП",value:d.dtp.RequestResult.Accidents[i].AccidentType},
                            //         {title:"Место ДТП",value:d.dtp.RequestResult.Accidents[i].RegionName},
                            //         {title:"Время ДТП",value:d.dtp.RequestResult.Accidents[i].AccidentDateTime},
                            //         {title:"Марка (модель) ТС",value:d.dtp.RequestResult.Accidents[i].VehicleMark+" ("+d.dtp.RequestResult.Accidents[i].VehicleModel+")"},
                            //         {title:"Статус",value:d.dtp.RequestResult.Accidents[i].VehicleDamageState+" "+d.dtp.RequestResult.Accidents[i].DamagePoints.join(', ')},
                            //         {title:"Год выпуска ТС",value:d.dtp.RequestResult.Accidents[i].VehicleYear}
                            //     );
                            // }
                            // putData($cc,dtp);
                        }
                        else {
                            putData($cc,[
                                {title:"Данные не зафиксированы",hint:'Мы не смогли найти факты, которые указывают на наличие ДТП.<br>Тем не менее, это не означает, что данный автомобиль НЕ УЧАСТВОВАЛ в ДТП'}
                            ]);
                        }
                        $cu.append('<li class="report-category"><h4 class="report-category-title">Количество владельцев</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Владельцев</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">История регистрационных действий</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Дата последней операции</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Дата последней операции</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Дата последней операции</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Дата последней операции</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Информация о розыске ТС в системе МВД России</h4><ul class="report-data column single"><li class="report-data-item"><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Информация о наложении ограничений в Госавтоинспекции на ТС</h4><ul class="report-data column single"><li class="report-data-item"><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Утилизация</h4><ul class="report-data column single"><li class="report-data-item"><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Использование автомобиля в качестве такси</h4><ul class="report-data column single"><li class="report-data-item"><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li><li class="report-category"><h4 class="report-category-title">Информация о нахождении в залоге у банков</h4><ul class="report-data"><li class="report-data-item"><h5 class="report-data-title">Дата регистрации</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Номер уведомления</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Имущество</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Залогодержатель</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li><li class="report-data-item"><h5 class="report-data-title">Залогодатель</h5><span class="report-data-value"><span class="locked-data"><span class="icon icon-lock"></span>Доступно в полном отчёте</span></span></li></ul></li>');
                        // putData($cc,[
                        //     {title:"Участие в ДТП",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Ограничения на регистрационные действия",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Проверка на нахождение в залоге",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Информация об угоне и розыске",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Пробег машины",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Количество владельцев ТС",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"История регистрационных действий",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Сведения о страховке ОСАГО",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Информация о утилизации",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Статус владельца (физ / юр. лицо)",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Использование в качестве такси",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Таможенная история",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"},
                        //     {title:"Сведения о покупке в лизинг",code:"hidden",value:"<span class=\"locked-data\"><span class=\"icon icon-lock\"></span>Доступно в полном отчёте</span>"}
                        // ]);
                        $(".vin-report").show();
                        $.ajax({
                            url:"/mail/invite.php",
                            dataType:"json",
                            data:{
                                vin:qp.vin,
                                email:qp.email,
                                cb_order_id:order.id
                            },
                            success:function(d){
                                console.debug(d);
                            }
                        });

                    }
                    else if(d.status=="full"){
                        console.debug(yaCounter44533300,'get-full-report occurs');
                        yaCounter44533300.reachGoal('get-full-report');
                        getFullReport(d,false,qp.example);
                        // $(".promo").removeClass("hidden");
                        $(".features").removeClass("hidden");
                        $(".offers").removeClass("hidden");
                    }
                    // if(qp.type=="full"){
                    //     yaCounter44533300.reachGoal('get-full-report');
                    //     getFullReport(d);
                    // }
                    // Навигация в отчете
                	var controller = new ScrollMagic.Controller();
                	new ScrollMagic.Scene({
                			duration: $(".report-wrapper").height() - 200,
                			offset: $(".header").height() + 40
                		}).setPin(".report-nav").addTo(controller);
                }
                catch(e){
                    console.debug(e);
                    $(".checkable-vin").html(
                        'Ваш отчёт по VIN коду - '+qp.vin+' не сформировался.'
                        +'<button class="button" onclick="document.location.reload();">Повторить попытку</button>'

                    )
                }
            },
            error:function(){
                $(".checkable-vin").html(
                    'Ваш отчёт по VIN коду - '+qp.vin+' не сформировался.'
                    +'<button class="button" onclick="document.location.reload();">Повторить попытку</button>'

                )
            },
            complete:function(){
                clearInterval(timerId);
                $("#buyForm").show();
                $(".vin-report-2").hide();
            }
        });
    }

});
