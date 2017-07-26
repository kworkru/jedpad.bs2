<?php
header('Content-Type: application/json; charset=utf-8');
include("autoload.php");

$p = isset($_REQUEST["p"])?$_REQUEST["p"]:false;
$promo = new cb\Promo();
$res = isset($_REQUEST["_"])?$promo->used($p):$promo->get($p);
echo json_encode($res);
?>
