<?php
namespace cb;
use core\Config as Config;
use core\Log as Log;
use core\HTTPConnector as Http;
use cb\Pdf as Pdf;
class Unisend{
    protected $_cfg=[];
    protected $_fields=["email","city","vin","id-obyav","region","price","year","model","marka","oplachen-do","balance","terif","id-company","Name","reg-date"];
    public function __construct(){
        $this->_cfg = Config::unisend();
    }
    public function addContact($d){
        if(!isset($d["email"]))return[];
        $req=[];
        $result = [];
        $result[] = $this->importContacts([
            "field_names"=>["email","email_list_ids","email_request_ip"],
            "data"=>[
                [$d["email"],$this->_cfg["list_ids"],Config::IP()]
            ]
        ]);
        $data = [
            "list_ids"=>$this->_cfg["list_ids"],
            "request_ip"=>(Config::IP()=="127.0.0.1")?"94.25.177.157":Config::IP(),
            "request_time"=>date("Y-m-d"),
            "overwrite"=>2,
            "double_optin"=>3,
            "fields"=>["email"=>$d["email"]]
        ];
        if(isset($d["vin"]))$data["fields"]["vin"]=$d["vin"];
        if(isset($d["city"]))$data["fields"]["city"]=$d["city"];
        if(isset($d["region"]))$data["fields"]["region"]=$d["region"];
        if(isset($d["model"]))$data["fields"]["model"]=$d["model"];
        if(isset($d["brand"]))$data["fields"]["marka"]=$d["brand"];
        if(isset($d["cb_order_id"]))$data["fields"]["id_vin"]=$d["cb_order_id"];
        if(isset($d["year"]))$data["fields"]["year"]=$d["year"];
        if(isset($d["payed_vin"]))$data["fields"]["payed_vin"]=$d["payed_vin"];
        $result[] = $this->subscribe($data);
        // new methods
        $se = $this->sendEmail([
            "email" => $d["email"],
            "sender_name" => $this->_cfg["sender"]["name"],
            "sender_email" => $this->_cfg["sender"]["email"],
            "subject" => "Проверка VIN ".$d["vin"],
            "body" => $this->getSendEmailBody($d),
            // "attachments" => $this->getSendEmailAttachments($d),
            "list_id"=>$this->_cfg["list_ids"],
        ]);
        $result[]=$se;
        // $cem =$this->createEmailMessage([
        //     "sender_name" => $this->_cfg["sender"]["name"],
        //     "sender_email" => $this->_cfg["sender"]["email"],
        //     "template_id" => $this->_cfg["templates"]["fast"]
        // ]);
        // $result[] = $cem;
        // Log::debug($cem);
        // if(isset($cem["result"]) && isset($cem["result"]["message_id"]) && !empty($cem["result"]["message_id"])){
        //     $cc = $this->createCampaign(["message_id"=>$cem["result"]["message_id"]]);
        //     $result[] = $cc;
        // }
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
        // file_put_contents("store/email_{$type}_{$d["vin"]}.html",$res);
        Log::debug("EMail {$type} body: ",$res);
        return $res;
    }
};
?>
