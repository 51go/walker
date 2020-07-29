<?php


class DirWalker extends Walker
{
    var $dir=null;
    var $dh=null;
    var $custom_errors=array(
        -1=>"is not a dir",
        -2=>"dir can't be opend"
    );
    function prepare($dir){
        $this->dir=$dir;
        if (!is_dir($this->dir)) {
            $this->ecode=-1;
            $this->ecode=$this->dir." is not a dir";
            return false;
        }
        if (($this->dh = opendir($this->dir))==false){
            $this->ecode=-2;
            $this->ecode=$this->dir." can't be opend";
            return false;
        }
        return $this->dir;
    }
    function getNextItem(){
        $item=readdir($this->dh);
        if($item===false){
            $this->eof=true;
        }
        return $item;
    }
    function isEOF(){
        return $this->eof;
    }
}
