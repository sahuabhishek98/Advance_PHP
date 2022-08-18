<?php 
//craete connection
$dsn="mysql:host=localhost; dbname=test;";
$db_user="root";
$db_password="";
try{
    $conn = new PDO($dsn, $db_user,$db_password);  
}
catch(PDOException $e){
    echo "Connection Failed" . $e->getMessage(); 
}

/*$conn = new PDO($dsn, $db_user,$db_password);
if($conn){
    echo "connected";
}*/
?> 