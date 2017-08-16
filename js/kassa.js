"use strict";
var realamount = 199;
var getYandexKassaForm = function(){
    $.when($("#buyForm [name=promo]").change()).then(function(){
        var email = $("#buyForm [name=email]").val(),
            phone = $("#buyForm [name=phone]").val(),
            promo = $("#buyForm [name=promo]").val(),
            amount = $("#buyForm .report-price .pay-price").text();

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
    realamount = $("#buyForm .report-price").attr("data-base");
    $(".payment-button").on("click",function(e){
        getYandexKassaForm();
        return false;
    });
    $(".promoButton").on("click",function(e){
    // $("[name=promo]").on("keyup change",function(e){
        var val = $("[name=promo]").val(),base_val = $("#buyForm .report-price").attr("data-base");
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
                        var amount = base_val-d.discount;
                        $("#buyForm .report-price .pay-price").text(amount);
                        $("#buyForm .report-price .price").addClass("old-price");
                        $("#buyForm .report-price .new-price").html(amount+'&nbsp;&#8381;').removeClass('hidden');
                        $("#buyForm [name=sum]").val(amount);
                    }
                }
            });
        }
        else {
            $("#buyForm .report-price .price").text(base_val);
        }
    });
});
