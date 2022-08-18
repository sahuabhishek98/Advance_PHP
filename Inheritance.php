<?php
//single inheritence
class Father{
    public $a;
    public $b;
    function getValue($x,$y){
        $this->a=$x;
        $this->b=$y;
    }
}
class Son extends Father{
 function display(){
    echo "First number is$this->a and Second number is $this->b";
 }
}
$call =new Son();
$call->getValue(3,4);
$call->display();


?>