<?php
include("autoload.php");
use core\Log as Log;
$result = ["status"=>"unknown"];
$resultJson = "{}";
$i=0;

$http = new core\HTTPConnector();
$rca = new cb\parse\Rca();
$zalog = new cb\parse\Zalog();
$gibdd = new cb\parse\Gibdd();
$cp = new cb\parse\Carprice();
$osago = new cb\parse\Osago();
$decodeVIN = new cb\VIN;
$cb = new cb\ClientBase();
Log::debug("cron service started at ".date("Y-m-d H:i:s"));
$current = $cb->getall([]);
foreach($current as $row){
    $data = $row["line"];
    $report = json_decode($data["report"],true);
    //$report = json_decode(preg_replace_callback('/"issue":\s*"(.+)"/ium',function($m){return '"issue": "'.preg_replace('/"/m',"'",$m[1]).'"';},$data["report"]),true);
    $data["state"]=((isset($report["history"])&&isset($report["history"]["status"]))?$report["history"]["status"]:"501");
    // echo "JSON Message: ".json_last_error_msg()."\n";
    // echo $data["report"]."\n";
    // print_r($report);
    $result = array_merge(is_array($report)?$report:[],$result);
    $date =date_create_from_format("Y-m-d H:i:s",$data["Время добавления"]);
    $diff=date_diff(date_create(date("Y-m-d H:i:s")),date_create($data["Время добавления"]));
    $data["timediff"] = ($diff->i+$diff->h*60+$diff->d*24*60+$diff->m*30*24*60+$diff->y*365*30*24*60);
    if(!in_array($data["state"],["200","404"]) && $data["timediff"]>60 && !empty($data["email"])){
        echo "#".++$i."\t".$data["timediff"]."\t".$data["ID"]."\t".$data["vin"]."\t".$data["type"]."\t".$data["status"]."\t".$data["state"]."\t";
        $rq = [
            "vin" => $data["vin"],
            "email"=>$data["email"]
        ];
        //print_r($result);exit;
        if($data["type"] == "full"){
            if($data["payed"] == "1"){
                if(!isset($result["history"])||count($result["history"])==0){
                    $result["history"]=json_decode($gibdd->history($rq),true);
                    if(isset($result["RequestResult"]) && isset($result["RequestResult"]["vehiclePassport"]) && isset($result["RequestResult"]["vehiclePassport"]["issue"]))
                        $result["RequestResult"]["vehiclePassport"]["issue"] = preg_replace('/"/m',"'",$result["RequestResult"]["vehiclePassport"]["issue"]);
                }
                if(!isset($result["dtp"])||count($result["dtp"])==0){$result["dtp"]=json_decode($gibdd->dtp($rq),true);}
                if(!isset($result["wanted"])||count($result["wanted"])==0){$result["wanted"]=json_decode($gibdd->wanted($rq),true);}
                if(!isset($result["restrict"])||count($result["restrict"])==0){$result["restrict"]=json_decode($gibdd->restrict($rq),true);}
                if(!isset($result["rca"])||count($result["rca"])==0){$result["rca"]=json_decode($rca->get($rq),true);}
                if(!isset($result["zalog"])||count($result["zalog"])==0){$result["zalog"]=json_decode($zalog->get($rq),true);}
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
                $data["status"] = "full";
            }
        }
        else {
            if(!isset($result["history"])||!isset($result["history"]["status"])||$result["history"]["status"]!="200"){
                $result["history"]=json_decode($gibdd->history($rq),true);
            }
            $result["status"]="small";
            $data["status"] == "small";
        }
        if(!isset($result["order"])){$result["order"]=["id"=>$data["ID"]];}
        $resultJson = json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $data["report"]=$resultJson;
        $data["reportLink"] = "http://checkauto.cars-bazar.ru/admin/?vin=".$rq["vin"];
        unset($data["state"]);
        unset($data["timediff"]);
        Log::debug("#".++$i."\t".$data["timediff"]."\t".$data["ID"]."\t".$data["vin"]."\t".$data["type"]."\t".$data["status"]."\t".$data["state"]."\t".(($result["history"]["status"]=="200")?"GOT DATA":"NOT GOT"));
        if($result["history"]["status"]=="200"){
            echo "GOT DATA!!!";

            $cb->update($data);
            ($data["type"=="full"])
                ?$http->fetch("http://checkauto.cars-bazar.ru/mail/apologize.email.php","GET",["cb_order_id"=>$data["ID"],"email"=>$data["email"],"vin"=>$data["vin"]])
                :$http->fetch("http://checkauto.cars-bazar.ru/mail/apologize.invite.php","GET",["cb_order_id"=>$data["ID"],"email"=>$data["email"],"vin"=>$data["vin"]]);
        }
        echo "\n";
    }
}
Log::debug("cron service finished at ".date("Y-m-d H:i:s"));
?>
