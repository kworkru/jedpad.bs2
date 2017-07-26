<?php
header('Content-Type: application/json; charset=utf-8');
chdir("..");
ob_start();
include("autoload.php");
$vin = isset($_REQUEST["vin"])?$_REQUEST["vin"]:"WF0RXXGCDR8R45807";
$type = isset($_REQUEST["type"])?$_REQUEST["type"]:"small";
$rq = ["vin" => $vin,"report"=>"","type"=>$type,"status"=>"new"];
$data = $rq;
$rca = new cb\parse\Rca();
$zalog = new cb\parse\Zalog();
$gibdd = new cb\parse\Gibdd();
$cp = new cb\parse\Carprice();
$osago = new cb\parse\Osago();
$cb = new cb\ClientBase();
$decodeVIN = new cb\VIN;
$current = $cb->get($rq);
$result = ["status"=>"unknown"];
$resultJson = "{}";
// проверка на существование записи
if(count($current)){
    foreach($current as $row){
        $data = $row["line"];
        break;
    }
}
else $cb->create($rq);
if($type == "full"){
    if(file_exists("store/".$rq["vin"].".json")){
        $result = json_decode(file_get_contents("store/".$rq["vin"].".json"),true);
    }
    else if($type == $data["type"] && $data["status"] == "full" && $data["report"]!="null" &&!is_null($data["report"])){
        echo json_encode($data,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $result = array_merge(["status"=>"ok"],json_decode($data["report"],true));
    }
    else {
        $result = [
            "status"=>"ok",
            "vin"=>$decodeVIN->get($rq["vin"]),
            "history"=> json_decode($gibdd->history($rq),true),
            "dtp"=> json_decode($gibdd->dtp($rq),true),
            "wanted"=> json_decode($gibdd->wanted($rq),true),
            "restrict"=> json_decode($gibdd->restrict($rq),true),
            "rca"=>json_decode($rca->get($rq),true),
            "zalog"=>json_decode($zalog->get($rq),true),
        ];
        $data["status"] = "full";
    }
    if(!isset($result["vin"])){
        $result["vin"]=$decodeVIN->get($rq["vin"]);
    }
    if(!isset($result["carprice"]["car_price_from"])&&isset($result["vin"])){
        $mark = $result["vin"]["brand"];
        $model = isset($result["vin"]["model"])?$result["vin"]["model"]:preg_replace("/".preg_quote($mark,'/')."/im","",$result["history"]["RequestResult"]["vehicle"]["model"]);
        $year = $result["history"]["RequestResult"]["vehicle"]["year"];
        $cpdata = [
            "mark"=>$mark,
            "model"=>$model,
            "year"=>$result["history"]["RequestResult"]["vehicle"]["year"]
        ];
        //print_r($cpdata);exit;
        $result["carprice"]=json_decode($cp->get($cpdata),true);
    }
    if(!isset($result["osago"]["price"])&&isset($result["history"]["RequestResult"]["vehicle"]["powerHp"])){
        $result["osago"]=$osago->get($result["history"]["RequestResult"]["vehicle"]["powerHp"]);
    }
}else {
    if($type == $data["type"] && $data["status"] == "first"){
        $result = array_merge(["status"=>"ok"],json_decode($data["report"],true));
    }
    else {
        $result = ["history"=> json_decode($gibdd->history($rq),true)];
        $data["status"] = "first";
    }
}
$resultJson = json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
$data["report"]=$resultJson;
if($data["status"]=="full")file_put_contents("store/".$rq["vin"].".json",$resultJson);
$data["pdf"] = "http://checkauto.cars-bazar.ru/admin/?vin=".$rq["vin"];
$cb->update($data);
ob_end_clean();
echo $resultJson;
?>
