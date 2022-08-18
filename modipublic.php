<?php
class Father{
    public $a;
    public function disp(){
        echo "parent function $this->a";
    }    
}
$obj=new Father();
$obj->a=10;
$obj->disp();

?>