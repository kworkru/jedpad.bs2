<?php
namespace cb\parse;
use core\Log as Log;
use core\HTTPConnector as Http;
use cb\AntiCaptcha as Captcha;

class Rca{
    public function get($d){
        $http = new Http();
        $html = $http->fetch("http://dkbm-web.autoins.ru/dkbm-web-1.0/policy.htm");
        $d["captcha"] = $http->fetch("http://dkbm-web.autoins.ru/dkbm-web-1.0/simpleCaptcha.png?".$this->random());
        file_put_contents("store/rca_captcha.jpg",$d["captcha"]);
        // solve captcha
        $captcha = new Captcha();
        $word = $captcha->get($d);
        if($word===false) return [];
        // checkdata http://check.gibdd.ru/proxy/check/auto/history
        $res = $http->fetch("http://dkbm-web.autoins.ru/dkbm-web-1.0/policy.htm","POST",[
            "vin" => $d["vin"],
            "answer"=>$word,
            "date"=>date("d.m.Y"),
            "lp"=>'',
            "bodyNumber"=>'',
            "chassisNumber"=>''
        ]);
        $http->close();
        return $res;
    }
    protected function random(){
        $res = "0.";
        $res.=str_pad(rand(0,9999)."", 4, "0", STR_PAD_LEFT);
        $res.=str_pad(rand(0,9999)."", 4, "0", STR_PAD_LEFT);
        $res.=str_pad(rand(0,9999)."", 4, "0", STR_PAD_LEFT);
        $res.=str_pad(rand(0,9999)."", 4, "0", STR_PAD_LEFT);
        return $res;
    }
};
?>
