<?php 
//craete connection
$dsn="mysql:host=localhost; dbname=test;";
$db_user="root";
$db_password="";
try{
    $conn = new PDO($dsn, $db_user,$db_password);
$name='Parwati';
$roll='113';
$address='Tamilnadu';
    $sql="INSERT INTO student(name,roll,address) VALUES ('$name','$roll','$address')";
$affected_row=$conn->exec($sql);
echo $affected_row ."Row inserted <br/>";
  
}
catch(PDOException $e){
    echo "Connection Failed" . $e->getMessage(); 
}
//insert data

?> 