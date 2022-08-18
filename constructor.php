<?php
class Student{
   public   $roll;
  /*  function __construct(){
        echo"constructor call";
    }
    */
    function __construct($rollno){
        echo "call parameterize constructor";
        $this->roll=$rollno;
        echo $this->roll;
    }
    function __destruct(){
        echo "call destructor";
    }

}
//$stu= new Student;
$stu= new Student(22);


?>