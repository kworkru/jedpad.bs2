<?php
namespace core;
class Config{
    public static function __callStatic($n,$a){
        if(!isset($cbConfig)){
            include("config.php");
        }
        return isset($cbConfig[$n])?$cbConfig[$n]:false;
    }
    public static function IP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
};
?>
