<?php


class CsvWalker extends Walker
{
    var $fp=null;
    var $file="";
    function getNextItem(){
        return $data = fgetcsv($this->fp, 20000, ",");
    }
    function isEOF(){
        return feof($this->fp);
    }
    function prepare($file){
        $this->file=$file;
        /**
        if(!is_file(file)){
        $this->ecode=-9;
        $this->error="$file is not a file";
        return false;
        }
         */
        $this->fp=fopen($file,"r");
        if($this->fp===false)
        {
            echo "run to ".__LINE__;
            $this->ecode=-10;
            $this->error="$file open failed;";
            return false;
        }
        return $this->fp;
    }
    function free(){
        fclose($this->fp);
    }
}
