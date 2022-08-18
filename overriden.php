<?php
class Father{
    function disp(){
        echo "Super class";
    }
}
class Son extends Father{
    function disp(){
        echo "Son  class";
    }
}
$obj= new Son();
$obj->disp();
?>
