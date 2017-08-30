<?php
namespace cb;
class Promo{
    protected $codes=[];
    protected $promoStore = "/home/admin/web/checkauto.cars-bazar.ru/public_html/admin/promo.json";
    // protected $promoStore = "admin/promo.json";
    public function __construct(){
        $this->loadCodes();
    }
    public function get($promo){
        $res=["discount"=>0,"response"=>false];
        if(isset($this->codes[strtoupper($promo)])){
            if($this->codes[strtoupper($promo)]["type"]=="once"){
                if($this->codes[strtoupper($promo)]["used"] == 0) $res["response"] = "used";
                else {
                    $res = [
                        "discount"=>$this->codes[strtoupper($promo)]["discount"],
                        "response"=>"ok"
                    ];
                    $this->storeCodes();
                }
            }
        }
        return $res;
    }
    public function delete($c){
        if(!isset($this->codes[$c])) return;
        unset($this->codes[$c]);
        $this->storeCodes();
    }
    public function create($c,$d,$q){
        $this->codes[$c]=[
            "used"=>$q,
            "was" =>$q,
            "date" => date("Y-m-d H:i:s"),
            "who"=> $_SERVER['REMOTE_ADDR'],
            "discount"=> $d,
            "type"=> "once"
        ];
        $this->storeCodes();
    }
    public function used($promo){
        $res=["discount"=>0,"response"=>false];
        if(isset($this->codes[strtoupper($promo)])){
            if($this->codes[strtoupper($promo)]["type"]=="once"){
                if($this->codes[strtoupper($promo)]["used"] > 0 ) {
                    $res = [
                        "discount"=>$this->codes[strtoupper($promo)]["discount"],
                        "response"=>"ok"
                    ];
                    $this->codes[strtoupper($promo)]["used"]--;
                    $this->codes[strtoupper($promo)]["date"] = date("Y-m-d H:i:s");
                    $this->codes[strtoupper($promo)]["who"] = $_SERVER["REMOTE_ADDR"];
                    $this->storeCodes();
                }
            }
        }
        return $res;
    }
    public function getList(){
        return $this->codes;
    }
    public function generate($c,$n,$a){
        $def = [
            "used"=> false,
            "discount"=> $a,
            "type"=> "once"
        ];
        $val = '';
        for($i=0;$i<$c;$i++){
            $val .= chr( rand( 65, 90 ) );
            $promo = $n.strtoupper(substr(sha1($val),rand(0,33),5));
            $this->codes[$promo] = $def;
            echo $promo."\n";
        }
        file_put_contents("store/promo.json",json_encode($c,JSON_PRETTY_PRINT));
    }
    protected function loadCodes(){
        $this->codes = json_decode(file_get_contents($this->promoStore),true);
    }
    protected function storeCodes(){
        file_put_contents($this->promoStore,json_encode($this->codes,JSON_PRETTY_PRINT));
    }
};
?>
