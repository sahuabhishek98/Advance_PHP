<?php
class Father{
    function __construct(){
    echo "Parent constructor called<br/>";
    }
}
class Son extends Father{
    function __construct(){
        //call parent constructor
        parent::__construct();
        echo "child constructor called<br/>";
        }
}
$obj= new Son();


?>