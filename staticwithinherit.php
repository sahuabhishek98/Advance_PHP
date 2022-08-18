<?php

class Father{
    public static $a=20;

}
class Son extends Father{
    function disp(){
        echo self::$a;
    }
}
$obj= new Son();
$obj->disp();
?>