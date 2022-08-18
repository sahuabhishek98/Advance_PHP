<?php
/*class Father{
public static $a=10;
public function disp(){
    echo self::$a;
}
}
Father::$a=90;  
$obj= new Father();
$obj->disp();
*/
//static method
class Father{
    public static function disp(){
        echo "my name Abhi";
    }
}
Father::disp();
?>