<?php
class Father{
    const mark=101;
    function disp(){
        echo self::mark;
    }
}
$obj=new Father(); 
//$obj->dis(); 
echo Father::mark;