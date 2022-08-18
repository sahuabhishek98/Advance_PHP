<?php
class Mobile{
 public $model;
    function showModel(){
        echo"modelnumber:$this->model<br/>";
    }
    function show($number){
        $this->model=$number;
        echo"modelnumber:$this->model <br/>";
    }
}
$samsung=new Mobile;
$lg=new Mobile;
$samsung->model="13pro";
$samsung->showModel();
 $lg->show(12);
 $lg->model="14pro";
 $lg->showModel();
  $lg->show(15);
?>

 