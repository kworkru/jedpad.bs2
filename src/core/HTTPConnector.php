<?php
namespace core;
use core\Log;
class HTTPConnector extends Common{
    protected $results;
    protected $response;
    protected $cookies=[];
    protected $headers=[];
    protected $cookieFile ='';
    protected $config = [
        "method" => "GET",
        "proxy" => false,
        "json"=>false
    ];
    protected $curl = false;
    public function __construct($a=[]){
        $this->config = array_merge($this->config,$a);
        $this->curl = curl_init();
    }
    public function fetch($url,$m="GET",$d=[]){
        $host = parse_url($url);
        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER=>$this->headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_MAXREDIRS =>20, // останавливаться после 10-ого редиректа
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "", // обрабатывает все кодировки
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HEADER => true,
            CURLINFO_HEADER_OUT => true,
            CURLOPT_COOKIEJAR => 'cookie-jar',
            CURLOPT_COOKIEFILE => 'logs/cookie.txt'
            //CURLOPT_VERBOSE => true,
            //CURLOPT_STDERR => fopen("curl.log",'w+')
        ];
        //$method = $_SERVER['REQUEST_METHOD'];
        //if($this->config["proxy"]!==false){$curlOptions[CURLOPT_PROXY] = $this->config["proxy"];}

        if($m == 'POST'){
            $data = $this->config["json"]?json_encode($d):http_build_query($d);
            Log::debug("data{type:".($this->config["json"]?"json":"http").",value:".preg_replace(["/%5B/m","/%5D/m","/%40/m"],["[","]","@"],$data)."}");
            $curlOptions[CURLOPT_POST]=1;
            $curlOptions[CURLOPT_POSTFIELDS]=$data;
        }else {
            if(count($d)){
                $curlOptions[CURLOPT_URL].=(preg_match("/\?/",$curlOptions[CURLOPT_URL])?"&":"?").http_build_query($d);
            };
        }
        curl_setopt_array($this->curl, $curlOptions);
        $s = curl_exec($this->curl);
        $info = curl_getinfo($this->curl);

        $rheads = $this->headers;
        Log::debug("HTTP/{$m} {$url}","Headers",$rheads,"Data",$d,"Response",$s);
        $this->responseHeaders(substr($s,0,$info["header_size"]));
        $response = substr($s,$info["header_size"]);

        return $response;
    }
    public function fetchMulti($urls,$m="GET",$d=""){
        if(!is_array($urls))$urls = [$urls];
        $response=[];
        $curls = [];
        $mh = curl_multi_init();
        foreach($urls as $url){
            $curls[$url] = curl_init();
            //$host = parse_url($url);
            $curlOptions = [
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER=>$this->headers,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => 1,
                CURLOPT_MAXREDIRS =>20, // останавливаться после 10-ого редиректа
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => ""
            ];
            if($this->config["proxy"]!==false)$curlOptions[CURLOPT_PROXY] = $this->config["proxy"];
            if($m == 'POST'){
                $curlOptions[CURLOPT_POST]=1;
                $curlOptions[CURLOPT_POSTFIELDS]=$d;
            }
            curl_setopt_array($curls[$url], $curlOptions);
            curl_multi_add_handle($mh,$curls[$url]);
        }
        do{
            curl_multi_exec($mh, $running);
            curl_multi_select($mh);
        } while ($running > 0);
        //$this->_properties["http_info"]=curl_multi_info_read($mh);
        // Obtendo dados de todas as consultas e retirando da fila
        foreach($curls as $url=>$curl){
            $response[$url]=curl_multi_getcontent($curl);
            $this->_properties["http_info"][$url] = curl_getinfo($curl);
            curl_multi_remove_handle($mh, $curl);
        }
        curl_multi_close($mh);
        return $response;
    }
    public function getHeaders(){
        return $this->headers;
    }
    protected function responseHeaders($h){
        if(preg_match_all("/^(.+?):\s*(.+?)\r*$/im",$h,$ms)){
            for($i=0; $i< count($ms[0]); $i++){
                $this->headers[$ms[1][$i]] = $ms[2][$i];
            }
        }
    }
    public function close(){
        curl_close($this->curl);
    }
};
?>
