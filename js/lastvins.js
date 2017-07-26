Number.prototype.pad2=function(){
    if (this<10) return "0"+this.toString();
    return this.toString();
};
var movevins = function(s){
    $(".recent-numbers-list:eq(1) li:eq(8)").remove();
    $(".recent-numbers-list:eq(1)").prepend($(".recent-numbers-list:eq(0) li:eq(8)"));
    $(".recent-numbers-list:eq(0)").prepend(s);
}
var getLastVins = function(l){
    $.ajax({
        url:"vin_base.php?l="+l,
        dataType:"json",
        success:function(d,x,s){
            var date = new Date(),
                leftcol = true;
                type = [
                    '<span class="check-category purchased">куплен полный отчёт для</span>',
                    '<span class="check-category">проверен автомобиль</span>',
                    '<span class="check-category">проверен автомобиль</span>'
                ];
            for(var i in d){
                vin = d[i],s = '<li class="recent-number"><div class="check-info">';
                s+='<span class="check-time">'+date.getHours().pad2()+':'+date.getMinutes().pad2()+'</span>';
                s+= type[(Math.round(Math.random()*10)%type.length)];
                s+='</div><div class="check-number"><div class="check-icon"><i class="icon icon-car"></i></div>';
                s+='<a class="link" href="/reports.php?vin='+vin+'&email=checkautocb@yandex.ru">'+vin+'</a></div></li>';
                movevins(s);
            }
        }
    });
}
window.getLastVins=getLastVins;
$(document).ready(function(){
    getLastVins(20);
    setInterval(function(){getLastVins(8);},10000);
});
