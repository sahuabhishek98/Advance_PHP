<?php 
$db_host= "localhost";
$db_user="root";
$db_password="";
$db_name="test";
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if($conn){
    echo "connected succesfully";
}
else{
    die("connection failed");
}


/*  craete connection
$conn=mysqli_connect("localhost","root","","test");
if($conn){
    echo "connected succesfully";
}>*/
?>