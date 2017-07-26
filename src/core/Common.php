<?php
namespace core;
class Common{
    public function __set($n,$v){
        if(isset($this->$n)) $this->$n = $v;
    }
};
?>
