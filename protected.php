<?php
class Father{
    protected $a=50;
   /* public function disp(){
        $this->a=30;
        echo $this->a;
    }*/
}
 class Son extends Father{
    public function disp(){
        echo $this->a;
    }
 }


$obj=new Son();
$obj->disp();


?>