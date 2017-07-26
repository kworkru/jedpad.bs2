<?php
$symbs = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
$res = [];

for($i=0;$i<2000;$i++){
    $code = 'CARBAZ2';
    $code.=$symbs[rand(0,count($symbs)-1)];
    $code.=$symbs[rand(0,count($symbs)-1)];
    $code.=$symbs[rand(0,count($symbs)-1)];
    $code.=$symbs[rand(0,count($symbs)-1)];
    $code.=$symbs[rand(0,count($symbs)-1)];
    $code.=$symbs[rand(0,count($symbs)-1)];
    $res[$code]=[
        "used"=>"1",
        "was"=>"1",
        "discount"=>50,
        "type"=>"once",
        "date"=>date("Y-m-d H:i:s"),
        "who"=>"local"
    ];
}
$pp = json_decode(file_get_contents('admin/promo.json'),true);
$pp = array_merge($pp,$res);
file_put_contents('admin/promo.json',json_encode($pp,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
//file_put_contents('mail/promo.json',json_encode(array_keys($res),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
file_put_contents('mail/promo.invite.json',json_encode(array_keys($res),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
// "CARBAZ0BDFC": {
//     "used": 10,
//     "was":10,
//     "date": "2017-04-23 00:11:07",
//     "who": "127.0.0.1",
//     "discount": 100,
//     "type": "once"
// },
?>
