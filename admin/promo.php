<?php
chdir("..");
ob_start();
include("autoload.php");
use core\Log as Log;
$rq = $_REQUEST;
$rs = [];
$promo = new cb\Promo();
if($rq["action"]=="delete"){
    $promo->delete($rq["code"]);
}
else if($rq["action"]=="update"){}
else if($rq["action"]=="create"){
    $promo->create($rq["code"],$rq["discount"],$rq["count"]);
}
$rs = $promo->getList();
ob_end_flush();
//if(!count($rs))http_response_code(500);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rs,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?>
