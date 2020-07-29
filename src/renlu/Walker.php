<?php


class Walker
{
    var $dir;
    var $callback=null;
    var $num = 0;
    var $ecode=0;
    var $error="";
    var $eof=false;
    var $errors=array(-999=>"call backfunction not exists");
    var $custom_errors=array(
        0=>"No error occures",
        -1=>"demo error"
    );
    var $last_result=null;
    function push_error($ecode,$error){
        $this->errors[$ecode]=$error;
    }
    function __construct(){
        foreach($this->custom_errors as $k=>$v){
            $this->push_error($k,$v);
        }
    }
    function getNextItem(){
    }
    function prepare($empty){
    }

    /**
     * return
     */
     function isEOF(){
    }
    function run(\Closure $callback){
        while(!$this->isEOF()){
            $item=$this->getNextItem();
            if($item===NULL||$item===false) return true;
            {
                $this->last_result=$callback($item);
            }
        }
    }
    function __destruct(){
        $this->free();
    }
    function free(){
    }
}
