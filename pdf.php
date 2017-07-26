<?php
include("autoload.php");

use cb\Pdf as Pdf;
use core\Log as Log;
ob_start();
$rq = $_REQUEST;
$cb = new cb\ClientBase();
$result = ["message"=>"Unknown","code"=>500];
$current = $cb->get(["ID"=>$rq["cb_order_id"],"vin"=>$rq["vin"]]);
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
if($found){
    $report = preg_replace_callback('/"issue":\s*"(.+)"/ium',function($m){return '"issue": "'.preg_replace('/"/m',"'",$m[1]).'"';},$data["report"]);
    $report = json_decode($report,true);
    $pdf = new Pdf;
    $reportPdf = $pdf->Report($report);
    //$current = $cb->update(["ID"=>$rq["cb_order_id"],"pdf"=>$reportPdf]);

}else $code = 404;
Log::debug(ob_get_clean());
http_response_code($code);
header('Content-Type: application/pdf; charset=utf-8');
echo $reportPdf;

?>
