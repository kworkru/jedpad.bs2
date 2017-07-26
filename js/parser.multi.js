//get query parameters
var qp = {};
var __p = window.location.href.match(/\?(.+)$/);
var timerId;
if(__p!=null&&__p.length>1){
    var __a = __p[1].split(/\&/);
    for(var i in  __a){
        var nv = __a[i].split(/=/);
        qp[nv[0]] = decodeURIComponent(nv[1].replace(/\+/ig," "));
    }
}
var makeRequest=function(section){
    var d={
        promo:(typeof(qp.promo)!="undefined")?qp.promo:""
    };
    $.ajax({
        url:"report.php?section="+section+"&vin="+qp.vin+"&type="+((typeof(qp.type)!="undefined")?qp.type:"small"),
        dataType:"json",
        data:d,
        success:function(d){
            try{
                var order = (typeof(d.order)=="undefined")?{id:1}:d.order;
                //console.debug(d,order,$("[name=cb_order_id]").val());
                $("[name=cb_order_id]").val(order.id);
                $("[name=vin]").val(qp.vin);
                if(d.status=="notpayed"){
                    $(".request-status").html('<span class="modal-window-text">Полный отчёт по VIN коду - <b>'+qp.vin+'</b>, не оплачен.</span>');
                    return;
                }
                else if(d.status=="notfound"){
                    $(".request-status").html('<span class="modal-window-text">Данный VIN код - <b>'+qp.vin+'</b>, не числится в Базе Данных ГИБДД.</span>');
                    return;
                }
                if(d.status=="partly")return;
                else if(d.status=="small"){
                    $(".vin-report").html('');
                    $(".vin-report").html('<a class="button" href="#buyForm">Рекомендуем получить полный отчёт</a>');
                    putData($(".vin-report"),[
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
                        {title:"Цвет",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
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
                        {title:"Комплектация автомобиля",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Участие в ДТП",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Ограничения на регистрационные действия",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Проверка на нахождение в залоге",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Информация об угоне и розыске",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Пробег машины",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Количество владельцев ТС",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"История регистрационных действий",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Сведения о страховке ОСАГО",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Информация о утилизации",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Статус владельца (физ / юр. лицо)",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Использование в качестве такси",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Таможенная история",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"},
                        {title:"Сведения о покупке в лизинг",code:"hidden",value:"<span style=\"color:#19b689;\">Доступно в полном отчёте</span>"}
                    ]);
                    closeModal();
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
                    yaCounter44533300.reachGoal('get-full-report');
                    getFullReport(d,false,qp.example);
                }
                clearInterval(timerId);
                $("#buyForm").show();
                $(".vin-report-2").hide();
            }
            catch(e){
                console.debug(e);
                $(".request-status").html(
                    '<span class="modal-window-text">Ваш отчёт по VIN коду - '+qp.vin+' не сформировался.</span>'
                    +'<button class="button" onclick="document.location.reload();">Повторить попытку</button>'

                )
            }
        },
        error:function(){
            $(".request-status").html(
                '<span class="modal-window-text">Ваш отчёт по VIN коду - '+qp.vin+' не сформировался.</span>'
                +'<button class="button" onclick="document.location.reload();">Повторить попытку</button>'

            )
        }
    });
}
// site logo addImage

$(document).ready(function(){
    $(".pdf").on("click",function(e){
		//makePDF(siteLogo,qp.vin);
        var oid = qp.cb_order_id;
        oid = (typeof(oid)!="undefined")?oid:$("[name=cb_order_id]").val();
        window.open("pdf.php?cb_order_id="+oid,"__blank");
	});
    if(typeof(qp.vin)!="undefined"){

        $("#buyForm").hide();
        //$(".request-status-title").html((typeof(qp.type)!="undefined"&&qp.type=="full")?"":"");
        $(".request-status-title").html("");
        $(".request-status").html('<span class="modal-window-text">Ваш отчёт по VIN коду - '+qp.vin+' подготавливается.</span>'
            +'<span class="modal-window-text">Пожалуйста подождите, идет обработка запроса.<br />Ожидаемое время формирования через: <span class="request-status-timer">45</span> секунд.</span>'
        );
        openModal("#modal2");
        timerId = setInterval(function(){
            var cv =parseInt($(".request-status-timer").text());
            cv--;
            $(".request-status-timer").text(cv);
            if(cv == 0 ){
                $(".request-status").html(
                    '<span class="modal-window-text">Ваш отчёт по VIN коду - '+qp.vin+' все еще формируется.</span>'
                        +'<span class="modal-window-text">"В данный момент очень много запросов к нашей системе.<br />Пожалуй, нам нужно еще <span class="request-status-timer">30</span> секунд.</span>'

                )
            }

        },1000);
        if(typeof(qp.type)!="undefined" || qp.type=="full") {
            makeRequest("history");
            makeRequest("dtp");
            makeRequest("wanted");
            makeRequest("restrict");
            makeRequest("rca");
            makeRequest("zalog");
        }
        else makeRequest("history");
    }

});
