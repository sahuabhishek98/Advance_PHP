<?php
//rule 1
 /*  abstract class Father{
    function disp(){
        echo "normal method";
    }
  }

  $obj= new Father();
  $obj->disp();
*/
//rule 2
abstract class Father{
    function disp(){
        echo "Normal method";
    }
    abstract function absmethod();
  }
  class Son extends Father {
    public function absmethod(){
        echo "Abstractor method";
    }
  }
  $obj =new Son;
  $obj->absmethod();

  ?>