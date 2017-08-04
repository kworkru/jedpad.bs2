<?php
header('Content-Type: application/json; charset=utf-8');
include("autoload.php");
ob_start();
$vin = strtoupper(isset($_REQUEST["vin"])?$_REQUEST["vin"]:"WF0RXXGCDR8R45807");
$type = isset($_REQUEST["type"])?$_REQUEST["type"]:"small";
$_rqEmail = trim(isset($_REQUEST["email"])?$_REQUEST["email"]:"");
if(empty($_rqEmail)){echo '{"status":"no email in request"}';exit;}
$rq = ["vin" => $vin,"email"=>$_rqEmail,"type"=>$type,"status"=>"new","source"=>(preg_match("/jedpad/",$_SERVER['HTTP_HOST'])?"vin.jedpad.com":"checkauto.cars-bazar.ru")];
$cbdata = $rq;
$rca = new cb\parse\Rca();
$zalog = new cb\parse\Zalog();
$gibdd = new cb\parse\Gibdd();
$cp = new cb\parse\Carprice();
$osago = new cb\parse\Osago();
$decodeVIN = new cb\VIN;
$cb = new cb\ClientBase();
$current = $cb->get($rq);
$result = ["status"=>"unknown"];
$resultJson = "{}";
// if(file_exists("store/".$rq["vin"].".json"))echo file_get_contents("store/".$rq["vin"].".json"); exit;
if($rq["vin"] == "WF0RXXGCDR8R45807"){
    $result = json_decode(file_get_contents("store/report.json"),true);
    $result["type"]=$rq["type"];
    $result["status"]=$rq["type"];
    $resultJson = json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    echo $resultJson; exit;
}
// проверка на существование записи
if(count($current)){
    foreach($current as $row){
        $cbdata = $row["line"];
        $result = json_decode(preg_replace_callback('/"issue":\s*"(.+)"/ium',function($m){return '"issue": "'.preg_replace('/"/m',"'",$m[1]).'"';},$data["report"]),true);
        break;
    }
}
else {
    $cbdata = $cb->create($rq);
    $current = $cb->get($rq);
    if(count($current)){
        foreach($current as $row){
            $cbdata = $row["line"];
            $result = json_decode($cbdata["report"],true);
            break;
        }
    }
}
//print_r($cbdata);exit;
if($type == "full"){
    if($cbdata["payed"] == "1"){
        if(!isset($result["history"])||count($result["history"])==0){
            $result["history"]=json_decode($gibdd->history($rq),true);
            if(isset($result["RequestResult"]) && isset($result["RequestResult"]["vehiclePassport"]) && isset($result["RequestResult"]["vehiclePassport"]["issue"]))
                $result["RequestResult"]["vehiclePassport"]["issue"] = preg_replace('/"/m',"'",$result["RequestResult"]["vehiclePassport"]["issue"]);
        }
        if(!isset($result["dtp"])||count($result["dtp"])==0){$result["dtp"]=json_decode($gibdd->dtp($rq),true);}
        if(!isset($result["wanted"])||count($result["history"])==0){$result["wanted"]=json_decode($gibdd->wanted($rq),true);}
        if(!isset($result["restrict"])||count($result["history"])==0){$result["restrict"]=json_decode($gibdd->restrict($rq),true);}
        if(!isset($result["rca"])||count($result["history"])==0){$result["rca"]=json_decode($rca->get($rq),true);}
        if(!isset($result["zalog"])||count($result["history"])==0){$result["zalog"]=json_decode($zalog->get($rq),true);}
        if(!isset($result["vin"])){$result["vin"]=$decodeVIN->get($rq["vin"]);}
        if(!isset($result["osago"]["price"])&&isset($result["history"]["RequestResult"]["vehicle"]["powerHp"])){$result["osago"]=$osago->get($result["history"]["RequestResult"]["vehicle"]["powerHp"]);}
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
        $result["status"]="full";
        // (
        //         isset($result["order"]) &&
        //         isset($result["history"]) &&
        //         isset($result["dtp"]) &&
        //         isset($result["wanted"]) &&
        //         isset($result["restrict"]) &&
        //         isset($result["rca"]) &&
        //         isset($result["zalog"]) &&
        //         isset($result["vin"]) &&
        //         isset($result["osago"]) &&
        //         isset($result["carprice"])
        //     )?"full":"partly";
        $cbdata["type"] = "full";
        $cbdata["status"] = "full";
    }
    else {
        $result = ["status"=>"notpayed"];
    }
}
else {
    if(!isset($result["history"])){$result["history"]=json_decode($gibdd->history($rq),true);}
    if(!isset($result["vin"])){$result["vin"]=$decodeVIN->get($rq["vin"]);}
    //$result["status"] = (isset($result["order"]) && isset($result["history"]))?"small":"partly";
    $result["status"] = "small";
    $cbdata["status"] = "first";
    $cbdata["type"] == "small";
}
if(!isset($result["order"])){$result["order"]=["id"=>$cbdata["ID"]];}
$resultJson = json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
$cbdata["email"] = $_rqEmail;
$cbdata["report"]=$resultJson;
$cbdata["reportLink"] = "http://checkauto.cars-bazar.ru/admin/?vin=".$rq["vin"];
$cb->update($cbdata);
$us = new cb\Unisend();
$us->addContact([
    "email"=>$_rqEmail,
    "vin"=>$cbdata["vin"],
    "payed_vin"=>$cbdata["payed"],
    //"city"=>"moscow",
    //"region"=>"moscow",
    "model"=>$result["history"]["RequestResult"]["vehicle"]["model"],
    "brand"=>$result["vin"]["brand"],
    "cb_order_id"=>$cbdata["ID"],
    "year"=>$result["history"]["RequestResult"]["vehicle"]["year"],
    "report"=>$result
]);
$outlogs = ob_get_clean();
core\Log::debug($outlogs);
echo $resultJson;
?>
