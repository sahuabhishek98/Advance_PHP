<?php
class Father{
    private $a=30;
  /*  public function disp(){
        echo "parent function $this->a";
    }*/
}
class Son extends Father{
    public function disp(){
        echo $this->a;
    }
}
$obj= new Son();
$obj->disp();


?>