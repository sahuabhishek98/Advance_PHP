<?php
class Father{
    final  function disp(){
        echo "Super class";
    }
    function shows(){
        echo "Hello Abhi";
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
