<?php
include("autoload.php");
$http = new core\HTTPConnector();
$promo = new cb\Promo();
$amount = isset($_REQUEST["amount"])?$_REQUEST["amount"]:false;
$email = isset($_REQUEST["email"])?$_REQUEST["email"]:false;
$phone = isset($_REQUEST["phone"])?$_REQUEST["phone"]:false;
$p = isset($_REQUEST["promo"])?$_REQUEST["promo"]:false;
$res = $promo->used($p);
$amount -= $res["discount"];
$data = [
    "shopId" => 113311,
    "scid"=>97661,
    "sum" => $amount,
    "customerNumber" => 'cb_'.$email,
    "shopSuccessURL" => 'https://cars-bazar.ru/payment/yk_test/success',
    "shopFailURL" => 'https://cars-bazar.ru/payment/yk_test/fail'
];
echo json_encode($data,JSON_PRETTY_PRINT);exit;
echo $http->fetch("https://money.yandex.ru/eshop.xml","POST",$data);
?>
