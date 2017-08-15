<?php
namespace cb;
use core\Config as Config;
use core\Log as Log;
use core\HTTPConnector as Http;
use cb\Pdf as Pdf;
use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;
/*
ID 7c2144e6ed7c758a968346dd578c0a4e
Secret 885044efa35ac86b5dd8f970ed4de036
*/
class SendPulse{
    protected $_cfg=[];
    protected $_wrapper=null;
    protected $_fields=["email","city","vin","id-obyav","region","price","year","model","marka","oplachen-do","balance","terif","id-company","Name","reg-date"];
    public function __construct(){
        $this->_cfg = Config::sendpulse();
        $this->_wrapper = new ApiClient($this->_cfg["api_key"], $this->_cfg["secure"], new FileStorage());
    }
    public function send($d){
        // var_dump($SPApiClient->listAddressBooks());
        // Send mail using SMTP
        $email = array(
            'html' => $this->getSendEmailBody($d),
            'text' => '',
            'subject' => "Проверка VIN ".$d["vin"],
            'from' => array(
                'name' => $this->_cfg["sender"]["name"],
                'email' =>  $this->_cfg["sender"]["email"],
            ),
            'to' => array(
                array(
                    'name' => $d["email"],
                    'email' => $d["email"]//'yanusdnd@inbox.ru',
                ),
            ),
            //  =>
        );
        if($d["type"]=="full")$email['attachments'] =  array($d["vin"].".pdf" => $this->getSendEmailAttachments($d));
        $ret = $this->_wrapper->smtpSendMail($email);
        Log::debug($ret);
        return $ret;
        // var_dump($this->_wrapper->smtpSendMail($email));
    }
    public function addContact($d){
        if(!isset($d["email"]))return[];
        $data = [
            "email"=>$d["email"],
            "variables"=>[]
        ];
        if(isset($d["vin"]))$data["variables"]["vin"]=$d["vin"];
        if(isset($d["city"]))$data["variables"]["city"]=$d["city"];
        if(isset($d["region"]))$data["variables"]["region"]=$d["region"];
        if(isset($d["model"]))$data["variables"]["model"]=$d["model"];
        if(isset($d["brand"]))$data["variables"]["marka"]=$d["brand"];
        if(isset($d["cb_order_id"]))$data["variables"]["id_vin"]=$d["cb_order_id"];
        if(isset($d["year"]))$data["variables"]["year"]=$d["year"];
        if(isset($d["payed_vin"]))$data["variables"]["payed_vin"]=$d["payed_vin"];
        $result = $this->_wrapper->addEmails($this->_cfg["list_ids"],[$data]);
        return $result;
    }
    public function __call($f,$a){
        return $this->call($f,isset($a[0])?$a[0]:[]);
    }
    protected function call($method,$data){
        $res = [];
        try {
            $req = array_merge([
                "format"=>"json",
                "api_key"=>$this->_cfg["api_key"],
            ],$data);
            $http = new Http();
            $http->headers = ["Accept"=>"application/json, text/javascript, */*; q=0.01"];
            $res = $http->fetch($this->_cfg["host"]."/{$method}","POST",$req);
        }
        catch(\Exception $e){
            Log::debug($e);
        }
        return json_decode($res,true);
    }
    protected function getSendEmailAttachments($d,$type = "fast"){
        $pdf = new Pdf;
        $reportPdf = $pdf->FastReport($d["report"]);
        return $reportPdf;
        // return [iconv("cp1251","utf-8",$reportPdf)];
    }
    protected function getSendEmailBody($d,$type = "fast"){
        $template = file_get_contents($this->_cfg["templates"][$type]);
        $promo = json_decode(file_get_contents('mail/promo.invite.json'),true);
        $d["promo"] = array_shift($promo);
        $res = preg_replace_callback("/\{\{([^\}]+)\}\}/",function($m)use($d){
            $var = trim($m[1]);
            $res = (isset($d[$var]))?$d[$var]:'';
            return $res;
        },$template);
        file_put_contents("store/email_{$type}_{$d["vin"]}.html",$res);
        Log::debug("EMail {$type} body: ",$res);
        return $res;
    }
};
?>
