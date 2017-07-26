<?php
namespace cb\parse;
use core\Log as Log;
use core\HTTPConnector as Http;
use cb\AntiCaptcha as Captcha;

class Gibdd{
    protected $http;
    public function __call($func,$a){
        $d = $a[0];
        $http = new Http();
        // get captcha image "http://check.gibdd.ru/proxy/captcha.jpg?1492524114976"; where 1492524114976 = js Date()
        //echo "current request: "."http://check.gibdd.ru/proxy/captcha.jpg?".round(microtime(true) * 1000);return;
        $http->headers = [
            "Accept"=>"image/webp,image/*,*/*;q=0.8",
            "Accept-Encoding"=>"gzip, deflate, sdch",
            "Accept-Language"=>"en-US,en;q=0.8,ru;q=0.6",
            "Cache-Control"=>"no-cache",
            "Connection"=>"keep-alive",
            "Cookie"=>"JSESSIONID=A092D641C5E71AC58A6763AA870C59E7; _ym_uid=1492429588872323268; _ym_isad=2; JSESSIONID=A092D641C5E71AC58A6763AA870C59E7; _ga=GA1.2.371541914.1492429589",
            "DNT"=>"1",
            "Host"=>"check.gibdd.ru",
            "Pragma"=>"no-cache",
            "Referer"=>"http://www.gibdd.ru/check/auto/",
            "User-Agent"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36"
        ];
        //$d["captcha"] = $http->fetch("http://check.gibdd.ru/proxy/check/images/captcha_scale.gif");
        $d["captcha"] = $http->fetch("http://check.gibdd.ru/proxy/captcha.jpg?".round(microtime(true) * 1000));
        $rawHeaders = $http->getHeaders();
        $headers  = [
            "Cookie" => preg_replace("/([^=]+=[^;]+).*/","$1",$rawHeaders["Set-Cookie"]),//."; ".preg_replace("/([^=]+=[^;]+).*/","$1",$rawHeaders["Set-Cookie"]),
            "Referrer-Policy"=>"no-referrer-when-downgrade",
            "Accept"=>"application/json, text/javascript, */*; q=0.01",
            "Accept-Encoding"=>"gzip, deflate",
            "Accept-Language"=>"en-US,en;q=0.8,ru;q=0.6",
            "Cache-Control"=>"no-cache",
            "Connection"=>"keep-alive",
            "Content-Length"=>"57",
            "Content-Type"=>"application/x-www-form-urlencoded; charset=UTF-8",
            "DNT"=>"1",
            "Host"=>"check.gibdd.ru",
            "Origin"=>"http://www.gibdd.ru",
            "Pragma"=>"no-cache",
            "Referer"=>"http://www.gibdd.ru/check/auto/"
        ];
        //print_r($headers);
        $http->headers = $headers;
        file_put_contents("store/captcha.jpg",$d["captcha"]);

        // solve captcha
        $captcha = new Captcha();
        $word = $captcha->get($d);
        if($word===false) return "{}";
        // checkdata http://check.gibdd.ru/proxy/check/auto/history
        $res = $http->fetch("http://check.gibdd.ru/proxy/check/auto/".$func,"POST",[
            "vin" => $d["vin"],
            "captchaWord"=>$word,
            "checkType"=>$func
        ]);
        $http->close();
        return $res;
    }
};
?>
