"use strict";
var realamount = 199;
var getYandexKassaForm = function(){
    $.when($("#buyForm [name=promo]").change()).then(function(){
        var email = $("#buyForm [name=email]").val(),
            phone = $("#buyForm [name=phone]").val(),
            promo = $("#buyForm [name=promo]").val(),
            amount = $("#buyForm .report-price .price").text();//.attr("data-base"),

        $("#buyForm [name=sum]").val(amount);
        //$("#buyForm [name=sum]").val("1");
        $("#buyForm [name=customerNumber]").val('cb_'+email);
        $("#buyForm [name=cps_email]").val(email);
        $("#buyForm [name=cps_phone]").val(phone);
        console.debug(email,promo,amount);
    });
}
window.getYandexKassaForm = getYandexKassaForm;
$(document).ready(function(){
    realamount = $("#buyForm .report-price .price").text();
    $(".payment-button").on("click",function(e){
        getYandexKassaForm();
        return true;
    });
    $("[name=promo]").on("keyup change",function(e){
        var val = $(this).val(),base_val = $("#buyForm .report-price .price").attr("data-base");
        if(base_val==null || typeof(base_val)=="undefined"){
            base_val =$("#buyForm .report-price .price").text();
            $("#buyForm .report-price .price").attr("data-base",base_val);
        }
        if(val.length>3){
            $.ajax({
                url:"promo.php",
                type:"POST",
                dataType:"json",
                data:{p:val},
                success:function(d){
                    if(typeof(d.response)!="undefined" && d.response== "ok"){
                        $("#buyForm .report-price .price").text(base_val-d.discount);
                    }
                }
            });
        }
        else {
            $("#buyForm .report-price .price").text(base_val);
        }
    });
});
