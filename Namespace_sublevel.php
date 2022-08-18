<?php
namespace Product\India;
const NUM=10;
class Laptop{
    function __construct(){
        echo "<h1>Product namespace</h1>";
    }
}
function disp(){
    echo "<h1>Product namespace-disp functiom</h1>";
}
echo NUM;
disp();
$obj=new Laptop;
?>