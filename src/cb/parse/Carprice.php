<?php
namespace cb\parse;
use core\Log as Log;
use core\HTTPConnector as Http;
//use cb\AntiCaptcha as Captcha;

class Carprice{
    protected $encodes = [];
    protected $emails = [
        'checkautocb@yandex.ru'
        // 'vl.bushuev@yandex.ru',
        // 'vsb@garan24.ru',
        // 'vsb@gauzymall.ru'
    ];
    public function __construct(){
        if(file_exists("store/cp.encodes.json")){
            $this->encodes = json_decode(file_get_contents("store/cp.encodes.json"),true);
        }
    }
    public function get($d=[]){
        $http = new Http();
        $brands = json_decode($http->fetch("https://evaluate-api.carprice.ru/evaluate-form/brands?type_id=0"),true);
        $d["mark"] = mb_strtolower($d["mark"]);
        $d["model"] = mb_strtolower($d["model"]);
        foreach($brands["data"] as $brand){
            if(mb_strtolower($brand["text"])==$d["mark"]){
                $d["brand_id"] = $brand["value"];
                break;
            }
        }
        Log::debug("brands",$d);
        if(!isset($d["brand_id"]) || is_null($d["brand_id"]) || $d["brand_id"] == "null") return json_encode(["status"=>"nobrand","brand"=>$d["mark"]],JSON_PRETTY_PRINT);
        $models = json_decode($http->fetch("https://evaluate-api.carprice.ru/evaluate-form/models?brand_id=".$d["brand_id"]."&year=".$d["year"]),true);
        $first = true;
        if(isset($models["data"])){
            foreach($models["data"] as $model){
                if($first){$model_id = $model["value"];$first=false;}
                if(preg_match("/".preg_quote($d["model"])."/imu",mb_strtolower($model["text"]))){
                    $d["model_id"] =$model["value"];
                    break;
                }
            }
        }
        Log::debug("models",$d);
        if(!isset($d["model_id"]) || is_null($d["model_id"]) || $d["model_id"] == "null") $d["model_id"]=$model_id;//return json_encode(["status"=>"nomodel","model"=>$d["model"]],JSON_PRETTY_PRINT);
        $request = [
            'action' => 'set-user-data',
            'type_tech_id' => '0',
            'brand_id' => $d["brand_id"],
            'year' => $d["year"],
            'model_id' => $d["model_id"],
            'email' => $this->emails[rand(0,count($this->emails)-1)],
            'terms' => 'Y'
        ];
                // 'body_type_id': body_type_id,
                // 'modification_id': modification_id,
                // 'partner_card_number': (typeof partnerCardNumber !== 'undefined') ? partnerCardNumber.value : '',
                // 'longitude': $('[name="longitude"]').val(),
                // 'latitude': $('[name="latitude"]').val()

        $res = $http->fetch("https://www.carprice.ru/local/components/linemedia.carsale/evaluate.main/ajax/ajax.php","GET",$request);
        Log::debug("request",$request,$res);
        $http->close();
        $res = iconv("cp1251","utf8",$res);
        return $res;
    }
    protected function encodeMark($m){
        return mb_strtolower(isset($this->encodes[$m])?$this->encodes[$m]:$m);
    }
};
?>
