<?php
include("autoload.php");

use core\Log as Log;

$rq = $_REQUEST;
$cb = new cb\ClientBase();
$result = ["message"=>"Unknown","code"=>500];
$current = $cb->get(["ID"=>$rq["id"],"vin"=>$rq["vin"]]);
//$current = $cb->get("vin"=>$rq["vin"]]);
$found = false;
$data = [];
$reportPdf="";
$code = 200;
if(count($current)){
    foreach($current as $row){
        $data = $row["line"];
        $found = true;
        break;
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

?>
