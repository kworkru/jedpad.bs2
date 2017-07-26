<?php
namespace cb;
use core\Config as Config;
use core\Log as Log;
use core\HTTPConnector as Http;
class ClientBase{
    protected $access_id = false;
    protected $accessTime = 0;
    protected $key;
    protected $host;
    protected $login;
    protected $version;
    protected $reportTable;
    protected $clientTable;
    public function __construct(){
        $cfg = Config::clientBase();
        $this->key = $cfg["key"];
        $this->host = $cfg["host"];
        $this->login = $cfg["login"];
        $this->version = $cfg["version"];
        $this->reportTable = intval($cfg["reportTable"]);
        $this->auth();
        //$this->getTables();
    }
    public function auth(){
        $res = $this->call("auth","request",["login"=>$this->login]);
        if($res["code"]==0){
            $res = $this->call("auth","auth",["login"=>$this->login,"hash"=>md5($res["salt"].$this->key)]);
            if($res["code"]==0){
                $this->access_id = $res["access_id"];
                $this->accessTime = time();
            }
            else Log::debug($res);
        }
        else Log::debug($res);
        return $this->access_id;
    }
    public function create($_d){
        $this->checkAuth();
        $d=$this->checkParams($_d);
        $res = $this->call("data","create",[
            "table_id"=>$this->reportTable,
            "cals"=>false,
            "data"=>[
                "line" => $d
            ]
        ]);
        Log::debug("create CB",$d,$res);
        if(!$res["code"]==0)Log::debug($res);
        return $res;
    }
    public function update($_d){
        $this->checkAuth();
        $d=$this->checkParams($_d);
        if(isset($d["cb_order_id"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["cb_order_id"],
            "union"=> "AND"
        ];
        else if(isset($d["ID"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["ID"],
            "union"=> "AND"
        ];
        if(isset($d["vin"])) $filters["vin"] = ["term"=> "=",
            "value"=> $d["vin"],
            "union"=> "AND"
        ];

        $res = $this->call("data","update",[
            "table_id"=>$this->reportTable,
            "cals"=>false,
            "data"=>[
                "line" => $d
            ],
            "filter"=>[
                "line" => $filters
            ],
        ]);
        Log::debug("update CB",$d,$res);
        if(!$res["code"]==0){
            Log::debug($res);
            if($res["message"]=="ERROR: Not session"){
                $this->access_id = false;
                $this->accessTime=$this->accessTime-31;
                $this->auth();
                $this->update($d);
            }
        }
    }
    public function delete($d){
        $this->checkAuth();
        $filters = [
            "Статус записи"=>[
                "term"=> "=",
                "value"=> 0,
                "union"=> "AND"
            ]
        ];
        if(isset($d["cb_order_id"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["cb_order_id"],
            "union"=> "AND"
        ];
        else if(isset($d["vin"])) $filters["vin"] = ["term"=> "=",
            "value"=> $d["vin"],
            "union"=> "AND"
        ];
        else if(isset($d["ID"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["ID"],
            "union"=> "AND"
        ];
        $res = $this->call("data","delete",[
            "table_id"=>$this->reportTable,
            "cals"=>false,
            "filter"=>[
                "line" => $filters
            ]
        ]);
        if($res["code"]==0)return $res["data"];
        else Log::debug($res);
        return [];
    }
    public function get($d){
        $this->checkAuth();
        $filters = [
            "Статус записи"=>[
                "term"=> "=",
                "value"=> 0,
                "union"=> "AND"
            ]
        ];
        if(isset($d["cb_order_id"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["cb_order_id"],
            "union"=> "AND"
        ];
        else if(isset($d["vin"])) $filters["vin"] = ["term"=> "=",
            "value"=> $d["vin"],
            "union"=> "AND"
        ];
        else if(isset($d["ID"])) $filters["ID"] = ["term"=> "=",
            "value"=> $d["ID"],
            "union"=> "AND"
        ];
        $res = $this->call("data","read",[
            "table_id"=>$this->reportTable,
            "cals"=>false,
            "fields" => [
                "line"=>[]
            ],
            "filter"=>[
                "line" => $filters
            ],
            "sort"=>[
                "line"=>[
                    "ID"=>"DESC"
                ]
            ],
            "start"=>0,
            "limit"=>1
        ]);
        Log::debug("get",$d,$res);
        if($res["code"]==0)return $res["data"];
        return [];
    }
    public function getall($d){
        $this->checkAuth();
        $filters = [
            // "Статус записи"=>[
            //     "term"=> "=",
            //     "value"=> 0,
            //     "union"=> "AND"
            // ]
        ];
        if(isset($d["vin"])) $filters["vin"] = ["term"=> "=",
            "value"=> $d["vin"],
            "union"=> "AND"
        ];
        $res = $this->call("data","read",[
            "table_id"=>$this->reportTable,
            "cals"=>false,
            "fields" => [
                "line"=>[]
            ],
            "filter"=>[
                "line" => $filters
            ],
            "sort"=>[
                "line"=>[
                    "ID"=>"DESC"
                ]
            ],
            "start"=>0,
            "limit"=>24
        ]);
        if($res["code"]==0)return $res["data"];
        else Log::debug($res);
        return [];
    }
    public function call($mod,$met,$data){
        $res = [];
        try{
            $http = new Http(["json"=>true]);
            $http->headers = ["Accept"=>"application/json, text/javascript, */*; q=0.01"];
            if($this->access_id!==false)$data["access_id"] = $this->access_id;
            else $data["v"] = $this->version;
            $res = $http->fetch($this->host."/{$mod}/{$met}/","POST",$data);
            $http->close();
        }
        catch(\Exception $e){
            Log::debug($e);
        }
        return json_decode($res,true);
    }
    protected function checkAuth(){
        if(!$this->access_id || (time()-$this->accessTime)>30){
            $this->access_id = false;
            $this->auth();
        }
    }
    protected function getTables(){
        $tables = $this->call("table","get_list");
        foreach ($tables["data"] as $key => $value) {
            if($value["name"] == "Заявки") $this->clientTable = intval($key);
            else if($value["name"] == "Зпросы VIN") $this->reportTable = intval($key);
        }
    }
    protected function checkParams($_data){
        return $_data;
        foreach ($res as $key => $value) {
            $val = trim($value);
            if(!empty($val))$res[$key]=$value;
        }
        return $res;
    }
};
?>
