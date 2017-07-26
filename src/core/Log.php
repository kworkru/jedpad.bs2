<?php
namespace core;
class Log{
    protected static $LogDir = "logs";
    protected static $LogName = "g";
    public static $console = false;
    public static function debug(){
        $out = "DEBUG\t".self::get_caller_info();
        foreach(func_get_args() as $s){
            if(is_array($s)||is_object($s)) $s = json_encode($s,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            $out.="\t".$s."\n";
        }
        $out.="\n";
        self::_putdata($out);
    }
    protected static function _putdata($s){
        if(self::$console)print($s);
        \file_put_contents(self::$LogDir."/".self::$LogName."-".date("Y-m-d").'.log',$s,FILE_APPEND);
    }
    protected static function get_caller_info() {
        $c = '';
        $line = '';
        $file = '';
        $func = '';
        $class = '';
        $trace = debug_backtrace();
        /*if (isset($trace[2])) {
            $file = $trace[1]['file'];
            $func = $trace[2]['function'];
            $line = $trace[1]['line'];
            if ((substr($func, 0, 7) == 'include') || (substr($func, 0, 7) == 'require')) {
                $func = '';
            }
        }
        else if (isset($trace[1])) {
            $file = $trace[1]['file'];
            $line = $trace[1]['line'];
            $func = '';
        }*/
        if (isset($trace[2]['class'])) {
            $class = $trace[2]['class'];
            $func = $trace[2]['function'];
            $file = $trace[2]['file'];
            $line = $trace[2]['line'];
        } else if (isset($trace[1]['class'])) {
            $class = $trace[1]['class'];
            $func = $trace[1]['function'];
            $file = $trace[1]['file'];
            $line = $trace[1]['line'];
        }
        if($class!='')self::$LogName = preg_replace("/\\\/im",".",$class);
        if ($file != '') $file = basename($file);
        $c = date("H:i:s")." File:".$file ;
        $c .= " Line:".$line;
        $c .= ($class != '') ? " " . $class . "->" : "";
        $c .= ($func != '') ? $func . "()" : "";
        $c .= "\t";
        return($c);
    }
};
?>
