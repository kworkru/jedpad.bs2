<?php
namespace cb\parse;
use core\Log as Log;
use core\HTTPConnector as Http;
//use cb\AntiCaptcha as Captcha;

class Osago{
    public function get($power){
        $Tb;$Kt;$Kbm;$Kvs;$Ko;$Km;$Kp;$Ks;$Kn;
        $power = intval($power);
        $owner=0;
        $vehicle = 0;
        $area = 0;
        $Tb=$this->osagoVehicles[$vehicle]["Tb1"];
        $Kt=$this->osagoAreas[$area]["Kt1"];
        $Kp=1.0;
        $Ks=1.0;
        $Km = 0.6;
        if(intval($power)>50)$Km = 1.0;
        if(intval($power)>70)$Km = 1.1;
        if(intval($power)>100)$Km = 1.2;
        if(intval($power)>120)$Km = 1.4;
        if(intval($power)>150)$Km = 1.6;
        $Kvs=1.0;
        $Ko=1.8;
        $Kbm=1.0;
        $Kn=1.0;
        $p=$Tb*$Kt*$Kbm*$Kvs*$Ko*$Km*$Kp*$Ks*$Kn;
        $p=round($p,2);
        if($p>3*$Tb*$Kt) $p=3*$Tb*$Kt;
        return ["price"=>$p];
    }
    protected $osagoVehicles = [
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "1", "Tb1" => "1980", "Tb2" => "2375", "name" => "???????? ?/?"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "1", "Tb1" => "2965", "Tb2" => "2965", "name" => "???????? ?/?, ???????????? ? ?????"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "1215", "Tb2" => "1215", "name" => "????????? ? ???????????"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "2025", "Tb2" => "2025", "name" => "???????? ?/? ? ??????????? ?????? ?? 16 ? ???."],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "3240", "Tb2" => "3240", "name" => "???????? ?/? ? ??????????? ?????? ????? 16 ?"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "1620", "Tb2" => "1620", "name" => "???????? ? ?????? ????????. ???? ?? 20 ???."],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "2025", "Tb2" => "2025", "name" => "???????? ? ?????? ????????. ???? ????? 20"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "2965", "Tb2" => "2965", "name" => "????????, ???????????? ? ?????"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "1010", "Tb2" => "1010", "name" => "???????"],
      ["Kt" => "1", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "1620", "Tb2" => "1620", "name" => "???????????"],
      ["Kt" => "2", "Kbm" => "1", "Kn" => "1", "drivers" => "1", "power" => "0", "Tb1" => "1215", "Tb2" => "1215", "name" => "????????, ???????-???????????? ? ???? ??????"],
      ["Kt" => "1", "Kbm" => "0", "Kn" => "0", "drivers" => "0", "power" => "0", "Tb1" => "395", "Tb2" => "395", "name" => "??????? ? ???????? ????, ????????????? ???????, ??????????, ???????????? "],
      ["Kt" => "1", "Kbm" => "0", "Kn" => "0", "drivers" => "0", "power" => "0", "Tb1" => "810", "Tb2" => "810", "name" => "??????? ? ???????? ?/?, ???????????, ???????-????????"],
      ["Kt" => "2", "Kbm" => "0", "Kn" => "0", "drivers" => "0", "power" => "0", "Tb1" => "305", "Tb2" => "305", "name" => "??????? ? ?????????, ???.-??????. ? ???? ???????"]
    ];
    protected $osagoAreas=[
      ["type" => "0", "Kt1" => "2.0", "Kt2" => "1.2", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.7", "Kt2" => "1.0", "name" => "?????? ? ?????????? ?????? ?????????? ???."],
      ["type" => "0", "Kt1" => "1.8", "Kt2" => "1.0", "name" => "?????-?????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????? ? ?????????? ?????? ????????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "???????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????-????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "???????????"],
      ["type" => "0", "Kt1" => "0.85", "Kt2" => "0.5", "name" => "????????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "???????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "???????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "???????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????? ????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????? ?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????? ?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "????????c??? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "????????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????? ???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????-???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????-???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "????????? ?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "????????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????-???"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????-?????????? ??????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "??????????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????-?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????-??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "?????????-?????????? ??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????-??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????-??-?????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "????????????? ????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "???????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "??????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????-?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "???????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.85", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????? ?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????? ????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "????????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????? ?????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "???????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "????????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????? ???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "???????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.85", "Kt2" => "0.5", "name" => "???????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????????-??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "?????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.85", "Kt2" => "0.5", "name" => "?????????? ??????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ?????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "?????????? ????????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????? ???????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "?????????? ????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ?????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????? ????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ???????"],
      ["type" => "0", "Kt1" => "0.85", "Kt2" => "0.5", "name" => "?????????? ????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "?????????? ????? ??"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ????????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "?????????? ???? (??????)"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "?????????? ???????? ??????-??????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "?????????? ?????????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "?????????? ????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "?????????? ???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????-??-????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "0.6", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "0.75", "Kt2" => "0.5", "name" => "???????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????-??-??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????-???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????????? ????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????? ?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "?????????? ???."],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "???????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "??????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????? (??????????? ???.)"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "???????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "????????? ???."],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "?????????? ??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????-???"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????-?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????-??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????-???"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "???"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.65", "Kt2" => "0.5", "name" => "??????????? ????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????-????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.8", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "????????? ??????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "????????? ??????????"],
      ["type" => "0", "Kt1" => "0.55", "Kt2" => "0.5", "name" => "????????? ?????????? ?????."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "?????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "???????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "????-?????????"],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "????"],
      ["type" => "0", "Kt1" => "1.6", "Kt2" => "1.0", "name" => "??????"],
      ["type" => "0", "Kt1" => "1.3", "Kt2" => "0.8", "name" => "?????????"],
      ["type" => "0", "Kt1" => "0.7", "Kt2" => "0.5", "name" => "??????????? ???."],
      ["type" => "0", "Kt1" => "1.0", "Kt2" => "0.8", "name" => "??????"],
      ["type" => "2", "Kt1" => "1.6", "Kt2" => "1.6", "name" => "??????????? ???????????"],
      ["type" => "3", "Kt1" => "1.0", "Kt2" => "1.0", "name" => "??????? ? ????? ???????????"]
    ];
    protected $osagoPowers=[
      ["max" => "50", "Km" => "0.6"],
      ["max" => "70", "Km" => "1.0"],
      ["max" => "100", "Km" => "1.1"],
      ["max" => "120", "Km" => "1.2"],
      ["max" => "150", "Km" => "1.4"],
      ["max" => "999", "Km" => "1.6"]
    ];
    protected $osagoClasses=[
      ["id" => "M", "c" => "2.45", "id0" => "0", "id1" => "M", "id2" => "M", "id3" => "M", "id4" => "M"],
      ["id" => "0", "c" => "2.30", "id0" => "1", "id1" => "M", "id2" => "M", "id3" => "M", "id4" => "M"],
      ["id" => "1", "c" => "1.55", "id0" => "2", "id1" => "M", "id2" => "M", "id3" => "M", "id4" => "M"],
      ["id" => "2", "c" => "1.40", "id0" => "3", "id1" => "1", "id2" => "M", "id3" => "M", "id4" => "M"],
      ["id" => "3", "c" => "1.00", "id0" => "4", "id1" => "1", "id2" => "M", "id3" => "M", "id4" => "M"],
      ["id" => "4", "c" => "0.95", "id0" => "5", "id1" => "2", "id2" => "1", "id3" => "M", "id4" => "M"],
      ["id" => "5", "c" => "0.90", "id0" => "6", "id1" => "3", "id2" => "1", "id3" => "M", "id4" => "M"],
      ["id" => "6", "c" => "0.85", "id0" => "7", "id1" => "4", "id2" => "2", "id3" => "M", "id4" => "M"],
      ["id" => "7", "c" => "0.80", "id0" => "8", "id1" => "4", "id2" => "2", "id3" => "M", "id4" => "M"],
      ["id" => "8", "c" => "0.75", "id0" => "9", "id1" => "5", "id2" => "2", "id3" => "M", "id4" => "M"],
      ["id" => "9", "c" => "0.70", "id0" => "10", "id1" => "5", "id2" => "2", "id3" => "1", "id4" => "M"],
      ["id" => "10", "c" => "0.65", "id0" => "11", "id1" => "6", "id2" => "3", "id3" => "1", "id4" => "M"],
      ["id" => "11", "c" => "0.60", "id0" => "12", "id1" => "6", "id2" => "3", "id3" => "1", "id4" => "M"],
      ["id" => "12", "c" => "0.55", "id0" => "13", "id1" => "6", "id2" => "3", "id3" => "1", "id4" => "M"],
      ["id" => "13", "c" => "0.50", "id0" => "13", "id1" => "7", "id2" => "3", "id3" => "1", "id4" => "M"]
    ];

};
?>
