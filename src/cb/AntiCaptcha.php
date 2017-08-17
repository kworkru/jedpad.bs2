<?php
namespace cb;
use core\Log as Log;
use core\HTTPConnector as Http;
class AntiCaptcha{
    protected $url = "http://rucaptcha.com/in.php";
    protected $url_res = "http://rucaptcha.com/res.php";
    protected $http;
    protected $key;
    public function __construct($key=false){
        if($key===false){
            include("config.php");
            $key = $cbConfig["rucaptcha"]["key"];
        }
        $this->key = $key;
        $this->http = new Http();
    }
    public function send($d){

    }
    public function get($d){
        $started = round(microtime(true) * 1000);
        $this->http->headers = ['Content-Type: multipart/form-data'];
        $res = $this->http->fetch($this->url,"POST",[
            "method"=>"base64",
            "key"=>$this->key,
            "body"=>base64_encode($d["captcha"]),
            "json"=>1
        ]);
        $response = json_decode($res,true);
        if( in_array($response["request"],["ERROR_IMAGE_TYPE_NOT_SUPPORTED","ERROR_ZERO_BALANCE","ERROR_KEY_DOES_NOT_EXIST"])) return false;
        $r = $this->check($response["request"]);
        $ended = round(microtime(true) * 1000);
        Log::debug("Got (in ".($ended - $started)." ms) catpcha ".$ret."\n");
        return $r;
    }
    public function check($id){
        $got = false;
        $to = 3;
        while(!$got){
            $res = $this->http->fetch($this->url_res,"GET",[
                "key"=>$this->key,
                "id"=>$id,
                "json"=>1,
                "action"=>"get"
            ]);
            $res = json_decode($res,true);
            $got = is_array($res) && isset($res["status"]) && ($res["status"]=="1");
            if(!$got)sleep($to);
        }
        return $res["request"];
    }
};
?>
