<?php
interface Father{
    const a=20;
    public function disp();
    public function getValue();
}
class Son implements Father{
    public $a;
    public function disp(){
  echo Father::a;
    }
    public function getValue(){

    }
}
$obj=new Son();
$obj->disp();

?>